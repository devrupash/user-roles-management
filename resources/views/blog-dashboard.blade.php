<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css">

    <title>Dashboard</title>
</head>
<body>
    <h1>This is a blog dashboard</h1>
    <h2>Sidebar Menu</h2>
    <ul>
        @can('admin')
        <li>
            <a href="#">Backup</a>
        </li>
        <li>
            <a href="#">Restore</a>
        </li>
        <li>
            <a href="#">Settings</a>
        </li>
        <li>
            <a href="#">User</a>
        </li>
        @endcan
        @can('editor')
        <li>
            <a href="#">Media</a>
        </li>
        <li>
            <a href="#">Categories</a>
        </li>
        <li>
            <a href="#">Tags</a>
        </li>
        @endcan
        @can('author')
        <li>
            <a href="#">Posts</a>
        </li>
        <li>
            <a href="#">Comments</a>
        </li>
        <li>
            <a href="#">Pages</a>
        </li>
        @endcan
         {{-- @can('author')
        <li>
            <a href="#">Posts</a>
        </li>
        <li>
            <a href="#">Comments</a>
        </li>
        <li>
            <a href="#">Pages</a>
        </li>
        @endcan --}}
    </ul>
</body>
</html>