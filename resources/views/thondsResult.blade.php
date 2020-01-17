<div class="col-md-12 col-xs-12 input-group">
    <h2 class="title-h2"><span style="margin: 0 10px;">TK lô gan {{$optionText}}  {{$ddlDayOfWeeks}},  {{$orig_date}}</span></h2>
</div>
<table class="table table-bordered table-lanxh text-center">
    <thead>
        <tr>
            <th>Lô tô gan</th>
            <th>Số ngày chưa về</th>
            <th>Ngày về gần nhất</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($newFullValues as $key => $node)
            <tr>
                <td class="col-xs-2 text-bold">{{$key}}</td>
                <td class="col-xs-4"><span class="text-red">{{$node['count']}}</span> ngày</td>
                <td class="col-xs-6">{{$node['last_day']}}</td>
            </tr>
        @endforeach
        
    </tbody>
</table>