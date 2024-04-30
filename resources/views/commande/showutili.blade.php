<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">command details</h5>
        </div>
        <div class="modal-body">
            <div class="py-12">
                <div class="container">
                    <div id="show"></div>
                    @include('commande.show')
                    {{-- @include('commande.show', ['commandesdutils' => $commande->commandesdutils]) --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>