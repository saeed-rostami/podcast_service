<div class="container">
    <div class="d-flex justify-content-around">
        <div class="alert alert-primary" role="alert">
            تعداد کل کاربران : {{\Illuminate\Support\Facades\DB::table('users')->count()}}
        </div>

        <div class=" alert alert-primary" role="alert">
            تعداد کل پادکست ها : {{\Illuminate\Support\Facades\DB::table('podcasts')->count()}}
        </div>

        <div class=" alert alert-primary" role="alert">
            تعداد کل اپیزود : {{\Illuminate\Support\Facades\DB::table('episodes')->count()}}
        </div>
    </div>
</div>
