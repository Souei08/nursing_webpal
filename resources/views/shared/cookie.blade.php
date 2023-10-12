<div class="modal fade" id="onload">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Privacy Policy</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.
          <br />
          <br />
          We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy. This Privacy Policy has been created with the help of the TermsFeed Privacy Policy Generator.
        </p>
        <p>When you select "OK" you are agreeing to {{ config('app.name') }}'s <a href="{{ route('terms-of-use') }}">Terms of Use.</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var myModal = new bootstrap.Modal(document.getElementById('onload'), {});

  $(window).on('load', function() {
        if ($(location).attr('pathname') === "/") {
            myModal.toggle();
        }
    });

  document.getElementById('onload').addEventListener('hidden.bs.modal', event => {
    localStorage.setItem('policy2', 'true');
  });
</script>