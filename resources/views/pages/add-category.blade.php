<div class="dashboard">

    @include('pages.includes.dashboard-header')
    <div class="right-section">
        @include('pages.includes.sidebar')


        <div class="inner-section container">


            <div class="add-employers">
                <div class="upper-section">

                    <h3 class="title">Add Category</h3>
                    <hr>
                    <p>Please fill out the following details to Category:</p>
                </div>
                <form action="{{ url('add-category') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-form">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h4 class="title">Category Information:</h4>
                        <hr>
                        <div class="input-boxes">
                            <div class="input-box" style="width: 40%;">
                                <label for="">Category Name :</label>
                                <input type="text" name="category" placeholder="category" class="form-control">
                                @error('category')
                                <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                       <div class="input-boxes mb-0" style=" margin-left: -643px;">
                            <button type="submit">
                                Add
                            </button>
                        </div> 

                    </div>
                </form>

            </div>
            @include('pages.includes.footer')
        </div>
    </div>
</div>