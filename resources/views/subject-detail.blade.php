<x-master>
    @push('css')
    <style>
    .mb-2 {
        margin-bottom: 1em;
    }
    </style>
    @endpush
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <h3 class="text-success text-center">Subject & hours details</h3>
            <form method="post" action="{{route('generateTimeTable')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label for="name">Subject Name</label>
                        </div>

                        <div class="col-md-6">
                            <label for="name">Hours/Week <span id="total-hours" class="text-danger">{{Session::get('total_hours')}}</span></label>
                        </div>
                    </div>

                    @for ($i = 0; $i<Session::get('subject'); $i++)
                    <div class="col-md-12">
                        <div class="col-md-6 mb-2">
                            <input type="text" class="form-control name" id="name" name="name[]">
                        </div>

                        <div class="col-md-6 mb-2">
                            <input type="text" class="form-control hours" id="hours" name="hours[]">
                        </div>
                    </div>
                    @endfor

                </div>

                <button type="submit" id ="submit" class="btn btn-primary disabled" disabled>Generate</button>
            </form>
        </div>
    </div>

    @push('script')
    <script>
        $(document).ready(function(){
            $('.hours').keyup(function () {
                let total_hours = parseInt($('#total-hours').html());
                let total = 0;

                let key = event.which;
                if(key >= 48 && key <= 57)
                {
                    $('.hours').each(function() {
                        if($(this).val() != '')
                        {
                            total += parseInt($(this).val());
                        }
                    });

                    if(total > total_hours)
                    {
                        alert('Total hours exceeds the limit');
                        $(this).val('');
                        return false;
                    }

                    if(total == total_hours)
                    {
                        $('#submit').removeAttr('disabled');
                        $('#submit').removeClass('disabled');
                    }
                    else
                    {
                        $('#submit').prop('disabled', true);
                        $('#submit').addClass('disabled');
                    }
                    return true;
                }
                else
                {
                    return false;
                }
            });
        })
    </script>
    @endpush
</x-master>
