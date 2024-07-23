<style>
    .add-employers .input-box {
        width: 100%;
        display: flex;
        gap: 10px;
        box-shadow: 1px 1px 5px 1px #d0d0d0a6;
        border-radius: 5px;
        justify-content: flex-start;
        align-items: center;
        padding: 10px;
    }

    .add-employers .input-box input {
        margin-top: 0 !important;
    }

    .add-employers .input-form {
        width: 90% !important
    }

    .add-employers .upper-section {
        width: 90% !important;
    }

    .add-employers .input-box .box .text label {
        margin-bottom: 0 !important;
    }

    .add-employers .input-box .box p {
        margin-bottom: 0;
    }
    .add-employers .upper-section button {
        background-color: #1b996a;
        border: none;
        padding: 7px 12px;
        border-radius: 10px;
        color: white;
        box-shadow: 0px 1px 5px 1px rgba(0, 0, 0, 0.248);
        margin: auto;
        transition: all 0.3s ease;
    }
    .add-employers .upper-section button:hover{
        background-color: #18895f;
    }
</style>



<div class="dashboard">

    @include('pages.includes.dashboard-header')
    <div class="right-section">
        @include('pages.includes.sidebar')


        <div class="inner-section container">


            <div class="add-employers">
                <div class="upper-section">
                <div class="back-button mb-4">
                        <a href="{{ url('/view-records') }}">
                        <button type="submit">
                        <i class="fa-solid fa-arrow-left"></i> Back
                        </button>
                        </a>
                    </div>

                    <h3 class="title">Edit Record Details</h3>
                    <hr>
                </div>
                <form action="{{ url('/update-record', ['id' => Crypt::encrypt($record->id)]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="input-form">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="input-boxes">
                            <div class="input-box">
                                <div class="text">
                                    <label for="">Amount :</label>
                                </div>
                                <div class="box">
                                    <input type="text" name="up_amount" value="{{ $record->amount ?? 'NA' }}" class="form-control">
                                </div>
                            </div>
                            <div class="input-box">
                                <div class="text">
                                    <label for="">Date :</label>
                                </div>
                                <div class="box">
                                    <input type="text" name="up_date" value="{{ $record->date ?? 'NA' }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="input-boxes">
                            <div class="input-box">
                                <label for="">Type :</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="up_type" id="inlineRadio1" value="income" {{ ($record->type=="income")? "checked" : "" }}>
                                  <label class="form-check-label" for="inlineRadio1">Income</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="up_type" id="inlineRadio2" value="expense" {{ ($record->type=="expense")? "checked" : "" }}>
                                  <label class="form-check-label" for="inlineRadio2">Expense</label>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="">Category :</label>
                                <select name="up_category" id="" class="form-control">
                                    <option value="">Please Select Category</option>
                                    @foreach($categorys as $category)
                                    <option value="{{ $category->id }}" {{ ($record->category== $category->id)? "selected" : "" }}>{{ $category->category_name ?? '' }}</option>
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
                                <textarea name="up_description" placeholder="Description" class="form-control" id="" cols="25"
                                    rows="4" value="{{ $record->date ?? 'NA' }}">{{ $record->description ?? 'NA' }}</textarea>
                                    @error('description')
                                <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="input-boxes mb-0">
                            <button type="submit">
                                Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            @include('pages.includes.footer')
        </div>
    </div>
</div>