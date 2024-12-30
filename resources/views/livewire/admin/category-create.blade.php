
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">ایجاد دسته بندی</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form wire:submit="store"  class="needs-validation"
                                  novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">نام </label>
                                        <input
                                            wire:model="title"
                                            placeholder="نام را اینجا تایپ کنید..."
                                            name="title" type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                        @error('title')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror

                                    </div>
                                    </div>

                                <button class="btn btn-primary" type="submit">بساز !</button>
                            </form>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
