<!-- Confirmation Modal-->
<div class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Do you want to delete it?')</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">@lang('You really delete this item?')</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times"></i> @lang('Cancel')</button>
                <form class="m-0" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> @lang('Yes')</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        var destroyModal = $('#destroyModal');
        $('body').on('click', '.delete-btn', function () {
            var url_to = $(this).data('url');
            destroyModal.find('form').attr('action', url_to);
            destroyModal.modal('show');
        });
    </script>
@endpush
