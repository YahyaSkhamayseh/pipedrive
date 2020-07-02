<div class="table-responsive-sm">
    <table class="table table-striped" id="blogBs-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Post Date</th>
        <th>Body</th>
        <th>Email</th>
        <th>Author Gender</th>
        <th>Post Type</th>
        <th>Post Visits</th>
        <th>Category</th>
        <th>Category Short</th>
        <th>Is Private</th>
        <th>Writer Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogBs ?? '' as $blogB)
            <tr>
                <td>{{ $blogB->title }}</td>
            <td>{{ $blogB->post_date }}</td>
            <td>{{ $blogB->body }}</td>
            <td>{{ $blogB->email }}</td>
            <td>{{ $blogB->author_gender }}</td>
            <td>{{ $blogB->post_type }}</td>
            <td>{{ $blogB->post_visits }}</td>
            <td>{{ $blogB->category }}</td>
            <td>{{ $blogB->category_short }}</td>
            <td>{{ $blogB->is_private }}</td>
            <td>{{ $blogB->writer_id }}</td>
                <td>
                    {!! Form::open(['route' => ['blogBs.destroy', $blogB->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('blogBs.show', [$blogB->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('blogBs.edit', [$blogB->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>