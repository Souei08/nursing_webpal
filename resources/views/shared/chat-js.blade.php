
@if (isset($conversation))
  <script type="text/javascript">
  $(document).ready(function() {
    const user_id = {{ Auth::user()->id }};
    const messages ={!! json_encode($conversation->messages ?? '[]') !!};
    const conversation_id = {{ $conversation->id }};

    messages.map(message => appendMessage(message));

    window.Echo.channel(`conversation.${conversation_id}`)
    .listen('MessageEvent', message => {
      appendMessage(message.data);
      scrollToBottom();
    });

    function scrollToBottom() {
      $('.chat-history').animate({ scrollTop: 20000000 }, "slow");
    }

    scrollToBottom();

    function appendMessage(message) {
      let html = '';
      if (message.user_id != user_id) {
        html = `<li class="clearfix" data-message-id="${message.id}">
                          <div class="message-data">
                              <span class="message-data-time">${moment(message.created_at).fromNow()}</span>
                          </div>
                          <div class="message my-message">${message.message}</div>                                    
                      </li> `
      } else {
        html = `<li class="clearfix" data-message-id="${message.id}">
                  <div class="message-data text-right">
                      <span class="message-data-time">${moment(message.created_at).fromNow()}</span>
                      <img src="${message.user.photo}" alt="avatar">
                  </div>
                  <div class="message other-message float-right">${ message.message }</div>
              </li>`
      }
      $('#chat-history').append(html);
    }

    $(document).on("submit", "#chat-message", async function (e) {
        $('input, select').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        e.preventDefault();

        if (!$('input[name=message]').val()) return;

        try {
        const response = await axios.post($(this).attr('action'), objectifyForm($(this).serializeArray()));
        appendMessage(response.data);
        scrollToBottom();
        $('input[name=message]').val('');
        } catch (error) {
        console.log(error)
        if (error && error.response && error.response.status === 422) {
          const errors = error.response.data.errors;
          const formatter = new Intl.ListFormat('en', { style: 'long', type: 'conjunction' });
          Object.keys(errors).map(key => {
            if ($('input[name="'+key+'"]')) {
              $('input[name="'+key+'"]').addClass('is-invalid');
              $('<div id="'+key+'" class="invalid-feedback">'+formatter.format(errors[key])+'</div>').insertAfter($('input[name="'+key+'"]'));
            }
            if ($('select[name="'+key+'"]')) {
              $('select[name="'+key+'"]').addClass('is-invalid');
              $('<div id="'+key+'" class="invalid-feedback">'+formatter.format(errors[key])+'</div>').insertAfter($('select[name="'+key+'"]'));
            }
          });
        }
      }
    });
  });
  </script>
@endif