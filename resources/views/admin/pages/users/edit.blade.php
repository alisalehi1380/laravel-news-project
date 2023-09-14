@extends("admin.layouts.master")





@section("main")

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



        <section class="pt-3 pb-1 mb-2 border-bottom">
            <h1 class="h5">Edit User</h1>
        </section>

        <section class="row my-3">

            <section class="col-12">

                <form method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="form-group">
                        <label for="username ">name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter title ... " value="{{ old('name' , $user->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter title ... " value="{{ old('email' , $user->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control " id="password" name="password" placeholder="Enter title ... ">
                    </div>

                    <div class="form-group">
                        <label for="permission">permission</label>
                        <select name="permission" id="permission" class="form-control" required autofocus>
                            <option value="0" @if (old('permission', $user->permission) == 0) selected @endif>User</option>
                            <option value="1" @if (old('permission', $user->permission) == 1) selected @endif>Admin</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ">update</button>
                </form>

            </section>
        </section>




    </main>

@endsection
