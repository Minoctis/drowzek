<div class="modal fade" id="@yield('modalId')" tabindex="-1" role="dialog" aria-labelledby="@yield('labelId')">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="@yield('labelId')">@yield('modalTitle')</h4>
            </div>
            <div class="modal-body">
                @yield('modalContent')
            </div>
            <div class="modal-footer">
                @yield('modalFooter')
            </div>
        </div>
    </div>
</div>