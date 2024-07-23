<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="dashboard">
    @include('pages.includes.dashboard-header')
    <div class="right-section">
        @include('pages.includes.sidebar')


        <div class="inner-section container">

            <h3 class="text-center">View All Records</h3>
            <hr>
            <div class="candidate-table">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- <div class="filter-container">

                    <label for="filterBy">Filter by:</label>
                    <div class="input-box">
                        <input type="text" id="filterInput" class="form-control" placeholder="Filter By Name">
                    </div>
                    <div class="input-box">
                        <input type="text" id="filterInput" class="form-control" placeholder="Filter By Experience">
                    </div>
                    <div class="input-box">
                        <input type="text" id="filterInput" class="form-control" placeholder="Filter By Job">
                    </div>
                    <div class="input-box">
                        <input type="text" id="filterInput" class="form-control" placeholder="Filter By Skills">
                    </div>
                    <div class="input-box">
                        <button id="filter-btn" class="btn btn-secondary">Filter</button>
                    </div>
                </div> -->
                <table border="1" id="tbl">
                    <tr>
                        <th>Sr No.</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    @foreach($records as $record)
                     <?php $category = DB::table('categories')->where('id', $record->category)->first();?>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->amount ?? '' }}</td>
                        <td>{{ $record->date ?? '' }}</td>
                        <td>{{ $record->type ?? '' }}</td>
                        <td>{{ $category->category_name ?? '' }}</td>
                        <td>
                            <div class="buttons">
                                <!-- <a href="{{ url('/candidate-details', ['id' => Crypt::encrypt($record->id)]) }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a> -->
                                <a href="{{ url('/edit-record', ['id' => Crypt::encrypt($record->id)]) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ url('/delete-record', ['id' => Crypt::encrypt($record->id)]) }}">
                                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                                </a>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach 
                </table>
            </div>
            @include('pages.includes.footer')
        </div>
    </div>
</div>



<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

    /* Styles for the resume modal (popup form) */
    .resume-modal {
        display: none;
        position: fixed;
        z-index: 9999999999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        overflow: hidden;
        backdrop-filter: blur(5px);
    }

    .resume-modal-content {
        /* background-color: #fefefe; */
        margin: 10% auto;
        padding: 20px;
        /* border: 1px solid #888; */
        width: 600px;
        position: relative;
        border-radius: 10px;
    }


    .resume-close-btn {
        color: #aaa;
        /* float: right; */
        position: absolute;
        right: 2%;
        top: 0;
        font-size: 28px;
        font-weight: bold;
    }

    .resume-close-btn:hover,
    .resume-close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }



    .card {
        border-radius: 10px;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1);
        width: 100%;
        /* background-color: #ffffff; */
        padding: 10px 30px 40px;
    }

    .card h3 {
        font-size: 22px;
        font-weight: 600;
    }

    .drop_box {
        margin: 10px 0;
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 3px dotted #a3a3a3;
        border-radius: 5px;
    }

    .drop_box h4 {
        font-size: 16px;
        font-weight: 400;
        color: #2e2e2e;
    }

    .drop_box p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 12px;
        color: #a3a3a3;
    }

    .btn {
        text-decoration: none;
        background-color: #1cb184;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        outline: none;
        transition: 0.3s;
    }

    .btn:hover {
        text-decoration: none;
        background-color: #ffffff;
        color: #1cb184;
        padding: 10px 20px;
        border: none;
        outline: 1px solid #1cb184;
    }

    .form input {
        margin: 10px 0;
        width: 100%;
        background-color: #e2e2e2;
        border: none;
        outline: none;
        padding: 12px 20px;
        border-radius: 4px;
    }


    /* Styles for the referral modal (popup form) */
    .referral-modal {
        display: none;
        position: fixed;
        z-index: 9999999999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(5px);
    }
    .referral-modal::-webkit-scrollbar{
        display: none;
    }

    .referral-modal-content {
        margin: 0 auto;
        padding: 10px;
        width: 60%;
        position: relative;
        border-radius: 10px;
    }
    .referral-modal-content label{
        font-weight: 700 !important;
        margin: 2px 0;
    }

    .referral-close-btn {
        color: #aaa;
        position: absolute;
        right: 2%;
        top: 0;
        font-size: 28px;
        font-weight: bold;
    }

    .referral-close-btn:hover,
    .referral-close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .inner-referral {
        display: flex;
        width: 100%;
        justify-content: center;
        gap: 10px;
        margin-bottom: 1rem;
        flex-direction: column;
    }
    .inner-referral .input-boxes{
        display: flex;
        gap: 20px;
    }
    .inner-referral .input-boxes .input-box{
        width: 100%;
    }
    .inner-referral .input-boxes label{
        font-size: .9rem;
    }
</style>




