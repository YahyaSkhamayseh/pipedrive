<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $blogB->title }}</p>
</div>

<!-- Post Date Field -->
<div class="form-group">
    {!! Form::label('post_date', 'Post Date:') !!}
    <p>{{ $blogB->post_date }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $blogB->body }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $blogB->email }}</p>
</div>

<!-- Author Gender Field -->
<div class="form-group">
    {!! Form::label('author_gender', 'Author Gender:') !!}
    <p>{{ $blogB->author_gender }}</p>
</div>

<!-- Post Type Field -->
<div class="form-group">
    {!! Form::label('post_type', 'Post Type:') !!}
    <p>{{ $blogB->post_type }}</p>
</div>

<!-- Post Visits Field -->
<div class="form-group">
    {!! Form::label('post_visits', 'Post Visits:') !!}
    <p>{{ $blogB->post_visits }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $blogB->category }}</p>
</div>

<!-- Category Short Field -->
<div class="form-group">
    {!! Form::label('category_short', 'Category Short:') !!}
    <p>{{ $blogB->category_short }}</p>
</div>

<!-- Is Private Field -->
<div class="form-group">
    {!! Form::label('is_private', 'Is Private:') !!}
    <p>{{ $blogB->is_private }}</p>
</div>

<!-- Writer Id Field -->
<div class="form-group">
    {!! Form::label('writer_id', 'Writer Id:') !!}
    <p>{{ $blogB->writer_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $blogB->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $blogB->updated_at }}</p>
</div>

