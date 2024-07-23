<div class="dashboard">

    @include('pages.includes.dashboard-header')
    <div class="right-section">
        @include('pages.includes.sidebar')


        <div class="inner-section container">


            <div class="add-employers">
                <div class="upper-section">

                    <h3 class="title">Add Income and Expense Records</h3>
                    <hr>
                    <p>Please fill out the following details to Income/Expense Records:</p>
                </div>
                <form action="{{ url('add-record') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-form">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h4 class="title">Income/Expense Information:</h4>
                        <hr>
                        <div class="input-boxes">
                            <div class="input-box">
                                <label for="">Amount :</label>
                                <input type="text" name="amount" placeholder="Amount" class="form-control">
                                @error('amount')
                                <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <label for="">Date :</label>
                                <input type="date" name="date" placeholder="date" class="form-control">
                                @error('date')
                                <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-boxes">
                            <div class="input-box">
                                <label for="">Type :</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="income">
                                  <label class="form-check-label" for="inlineRadio1">Income</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="expense">
                                  <label class="form-check-label" for="inlineRadio2">Expense</label>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="">Category :</label>
                                <select name="category" id="" class="form-control">
                                    <option value="">Please Select Category</option>
                                    @foreach($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>  
                        </div> 
                        <div class="input-boxes">
                            <div class="input-box">
                                <label for="">Description :</label>
                                <textarea name="description" placeholder="Description" class="form-control" id="" cols="30"
                                    rows="5"></textarea>
                                    @error('description')
                                <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="input-boxes mb-0">
                            <button type="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            @include('pages.includes.footer')
        </div>
    </div>
</div>