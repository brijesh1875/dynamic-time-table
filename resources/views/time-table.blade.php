<x-master>
    <div class="container">
        <table class="table">
            <tbody>
                @foreach ($time_table as $row)
                    <tr>
                        @foreach ($row as $column)
                            <td>{{$column}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-master>
