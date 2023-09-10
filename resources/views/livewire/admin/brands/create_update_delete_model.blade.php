    <!-- Create Modal -->
    <div wire:ignore.self class="modal fade" id="addBrandModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <div class="model-body">
                    <form wire:submit.prevent="addBrand">
                    <div class="my-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model.defer="name" class="form-control" placeholder="Brand Name" required>
                    </div>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>                
                    @enderror
                    <div class="mb-3">
                        <label for="slug" class="form-lable">Slug</label>
                        <input type="text" class="form-control" wire:model.defer="slug" class="form-control" placeholder="Slug" required>
                    </div>
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>                
                        @enderror
                    <div class="mb-5">
                        <label class="form-label" id="status">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" wire:model.defer="status"
                                id="inlineRadio1" value="0" checked>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" wire:model.defer="status"
                                id="inlineRadio2" value="1" >
                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                        </div>
                    </div>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>                            
                    @enderror
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                    </form>
                </div>
                
            
        </div>
        </div>
    </div>
    <!-- Create End Modal -->
    @push('script')
    <script>
        window.addEventListener('close-model', event=> {
            $('#addBrandModel').modal('hide');

        });
    </script>
    @endpush

    <!-- Edit Modal -->
    <div wire:ignore.self class="modal fade" id="editBrandModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                <button type="button" wire:click="resetInput()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="model-body">

                <div wire:loading class="my-5" >
                    <div class="spinner-border text-primary" role="status">
                    </div><span class="mx-4">Loading.....</span>
                </div>
                <div wire:loading.remove>
                <form wire:submit.prevent="updateBrand">
                <div class="my-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" wire:model.defer="name" class="form-control" placeholder="Brand Name" required>
                </div>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>                
                @enderror
                <div class="mb-3">
                    <label for="slug" class="form-lable">Slug</label>
                    <input type="text" class="form-control" wire:model.defer="slug" class="form-control" placeholder="Slug" required>
                </div>
                @error('slug')
                    <small class="text-danger">{{ $message }}</small>                
                    @enderror
                <div class="mb-5">
                    <label class="form-label" id="status">Status</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" wire:model.defer="status"
                            id="inlineRadio1" value="0" checked>
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" wire:model.defer="status"
                            id="inlineRadio2" value="1" >
                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                    </div>
                </div>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>                            
                @enderror
                <div class="modal-footer">
                    <button type="button" wire:click="resetInput()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                </div>
                </form>
                </div>
            </div>
                
        </div>
        </div>
    </div>
    <!-- Edit End Modal -->

    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                <div class="d-flex justify-content-center ">
                    <button type="button" class="btn btn-secondary close-btn mx-2" data-bs-dismiss="modal">Close</button>
                    <form>
                    <button type="submit" wire:click.prevent="delete()" class="btn btn-danger" data-bs-dismiss="modal">Yes, Delete</button>
                    </form>
                </div>
                </div>
        </div>
        </div>
    </div>
    <!-- End Delete Modal -->