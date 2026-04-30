<!-- modal search -->
<div id="modal-search" class="modal fade" tabindex="-1" aria-labelledby="modal-search-title" aria-hidden="true">
   <div class="modal-dialog modal-fullscreen-lg-down modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal-search-title">Cari</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
         </div>
         <div class="modal-body">
            <form role="search" action="{{ route('product.indraco', ['slug' => 'tugu-buaya']) }}" method="GET">
               <div class="mb-3">
                  <label for="search" class="form-label visually-hidden">Pencarian</label>
                  <input type="search" name="q" class="form-control" id="search" placeholder="Apa yang ingin Anda cari?">
               </div>
               <button type="submit" class="btn btn-primary text-capitalize">Cari</button>
            </form>
         </div>
      </div>
   </div>   
</div>
