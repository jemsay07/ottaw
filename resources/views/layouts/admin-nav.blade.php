@section('side-navigation')
<!--Side navigation start-->
    <div class="sidebar-wrap">
        <ul class="side-list">
            <li>
                <a href="/home">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.prize.create')  }}">New List</a>
            </li>
            <li>
                <a href="{{ route('admin.prize.index')  }}">List Item</a>
            </li>
        </ul>
    </div>
<!--Side navigation end-->
@endsection