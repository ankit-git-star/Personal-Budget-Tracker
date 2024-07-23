
<div class="table-tabs">
   
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
       
       
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="candidate-managment-tab" data-bs-toggle="pill" data-bs-target="#candidate-managment"
                type="button" role="tab" aria-controls="candidate-managment" aria-selected="false">Candidates</button>
        </li>
        
    </ul>
    
    <div class="tab-content" id="pills-tabContent">
        
        
        <div class="tab-pane fade" id="candidate-managment" role="tabpanel" aria-labelledby="candidate-managment-tab" tabindex="0">
            
        <!-- include candidate managment Table -->
        @include('pages.includes.tables.candidate-management')
        
        </div>
        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
            tabindex="0">...</div>
    </div>

</div>


<style>
    .table-tabs {
        padding: 25px 0;
    }
    .nav-pills .nav-link {
    border-radius: 30px !important;
}

    .table-tabs .nav {
        gap: 20px;
        background-color: white;
        padding: 10px;
        border-radius: 10px;
        /* justify-content: center; */
    }

    .table-tabs .nav li button {
        color: black !important;
    }

    .table-tabs .nav li button.active {
        color: white !important;
        background-color: #1cb184 !important;
    }


    @media screen and (max-width:690px){
        .table-tabs .nav li button{
            font-size: .8rem;
            padding: 5px 7px;
        }
        .table-tabs .nav {
            gap: 5px;
            justify-content: center;
        }
    }
    @media screen and (max-width:490px){
        .table-tabs .nav li button{
            font-size: .6rem;
            padding: 5px 7px;
        }
    }

   
</style>