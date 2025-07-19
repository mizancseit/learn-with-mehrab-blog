<!-- Modal -->
<div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure delete it?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form id="delete_form"  method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Yes Delete It</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var myModalEl = document.getElementById('destroyModal')
    myModalEl.addEventListener('show.bs.modal', function (event) {
       var button = $(event.relatedTarget);
       var action = button.data('action');
       $("#delete_form").attr('action',action)
    })
</script>
