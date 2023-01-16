<x-master>
    @push('css')
    <style>
    /* .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    } */
    </style>
    @endpush

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <form method="post" action="{{route('store')}}">
                @csrf
            <div class="form-group">
                <label for="working_days">No of Working days</label>
                <input type="text" class="form-control" id="working_days" name="working_days">
            </div>
            <div class="form-group">
                <label for="sub_per_day">No of Subjects per day</label>
                <input type="text" class="form-control" id="sub_per_day" name="sub_per_day">
            </div>
            <div class="form-group">
                <label for="subject">Total Subjects</label>
                <input type="text" class="form-control" id="subject" name="subject" min="1">
            </div>

            <div class="form-group">
                <label for="subject">Total Hours for week</label>
                <input type="hidden" class="form-control" id="total_hours" name="total_hours" value="0">
                <p class="text-danger" id="total_hours_a_week">0</p>
            </div>
            <div>


            </div>
            <button type="submit" id ="submit" class="btn btn-primary disabled" disabled>Submit</button>
            </form>
        </div>
    </div>

    {!! JsValidator::formRequest('App\Http\Requests\TimeStoreRequest') !!}
    @push('script')
    <script>
        $(document).ready(function(){
            $('#working_days, #sub_per_day').keyup(function () {

                let working_days = parseInt($('#working_days').val());
                let sub_per_day = parseInt($('#sub_per_day').val());

                if(working_days > 0 && sub_per_day > 0)
                {
                    let total_hours = working_days * sub_per_day;
                    $('#total_hours').val(total_hours);
                    $('#total_hours_a_week').html(total_hours);

                    if(total_hours > 0)
                    {
                        $('#submit').removeClass('disabled');
                        $('#submit').removeAttr('disabled');
                    }
                    else
                    {
                        $('#submit').addClass('disabled');
                        $('#submit').prop('disabled', true);
                    }
                }

            });
        })
    </script>
    @endpush
</x-master>
