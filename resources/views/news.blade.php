<!DOCTYPE html>
<html lang="en">

 <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <title>NEWS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/post.css" rel="stylesheet">
    
    

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 </head>
 <body>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="content" class="content content-full-width">
                <!-- begin profile -->
                <div class="profile">
                    <div class="profile-header">
                        <!-- BEGIN profile-header-cover -->
                        <div class="profile-header-cover"></div>
                        <!-- END profile-header-cover -->
                        <!-- BEGIN profile-header-content -->
                        <div class="profile-header-content">
                            <!-- BEGIN profile-header-img -->
                            <div class="profile-header-img">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                            </div>
                            <!-- END profile-header-img -->
                            <!-- BEGIN profile-header-info -->
                            <div class="profile-header-info">
                                <h4 class="m-t-10 m-b-5">Sean Ngu</h4>
                                <p class="m-b-10">UXUI + Frontend Developer</p>
                                <a href="{{Route('FormCategory')}}" class="btn btn-sm btn-info mb-2">Add Category</a>
                                <a href="{{Route('FormTag')}}" class="btn btn-sm btn-info mb-2">Add Tag</a>
                                <a href="{{Route('FormPost')}}" class="btn btn-sm btn-info mb-2">Add Post</a>
                            </div>
                            <!-- END profile-header-info -->
                           

                        </div>
                        <!-- END profile-header-content -->
                        <!-- BEGIN profile-header-tab -->
                        <ul class="profile-header-tab nav nav-tabs">
                            <li class="nav-item"><a href="#" target="__blank" class="nav-link_ active show">POSTS</a></li>
                            <li class="nav-item"><a href="#" target="__blank" class="nav-link_">ABOUT</a></li>
                            <li class="nav-item"><a href="#" target="__blank" class="nav-link_">PHOTOS</a></li>
                            <li class="nav-item"><a href="#" target="__blank" class="nav-link_">VIDEOS</a></li>
                            <li class="nav-item"><a href="#" target="__blank" class="nav-link_">FRIENDS</a></li>
                            
                            
                        </ul>
                        <!-- END profile-header-tab -->

                    </div>

                    <form action=" {{Route('search')}}"  method="post">
                        @csrf
                        <div class="row align-items-start">

                            <div class="col">
                                {{-- <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" name="q" aria-describedby="search-addon" /> --}}
                                <input list="brow1" name="Category" placeholder="Search By Category">
                                <datalist id="brow1" >
                                    @foreach ($categories as $value)
                                        <option value="{{$value->name}}"> </option>
                                    @endforeach
                                </datalist>
                                <button type="submit" class="btn btn-outline-primary">search</button>
                            </div>

                            <div class="col">
                                <input list="brow2" name="title" placeholder="Search By Title">
                                <datalist id="brow2" >
                                    @foreach ($posts as $post)
                                        <option value="{{$post->title}}"> </option>
                                    @endforeach
                                </datalist>
                                <button type="submit" class="btn btn-outline-primary">search</button>
                            </div>

                            <div class="col">
                                <input list="brow3" name="tag" placeholder="Search By Tag">
                                <datalist id="brow3" >
                                    @foreach ($posts as $post)
                                        @foreach ($post->tags as $tag )
                                            <option value="{{$tag->type}}"> </option>
                                        @endforeach

                                    @endforeach
                                </datalist>
                                <button type="submit" class="btn btn-outline-primary">search</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end profile -->
                <!-- begin profile-content -->
                <div class="profile-content">
                <!-- begin tab-content -->
                <div class="tab-content p-0">
                    <!-- begin #profile-post tab -->
                    <div class="tab-pane fade active show" id="profile-post">
                        <!-- begin timeline -->
                        <ul class="timeline">
                            @foreach ($posts as $post)
                                <li>

                                <!-- begin timeline-time -->
                                    <div class="timeline-time">
                                        <span class="time">{{$post->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!-- end timeline-time -->
                                    <!-- begin timeline-body -->
                                    <div class="timeline-body">
                                        <div class="timeline-header">
                                            <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></span>
                                            <span class="username"><a href="javascript:;">Sean Ngu</a> <small></small></span>
                                            <span class="pull-right text-muted">18 Views</span>
                                        </div>
                                        <div class="timeline-content">

                                            <h4 class="card-title">{{$post->title}}</h4>
                                            <p class="card-text">{{$post->paragraph}}</p>
                                            @foreach ($post->tags as $tag)
                                                <p class="card-text" style="display: inline; color: blue">&num;{{$tag->type}}</p>
                                            @endforeach

                                        </div>

                                        <div class="timeline-likes">
                                            <div class="stats-right">
                                                <span class="stats-text">259 Shares</span>
                                                <span class="stats-text">21 Comments</span>
                                            </div>
                                            <div class="stats">
                                                <span class="fa-stack fa-fw stats-icon">
                                                <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                                <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                                </span>
                                                <span class="fa-stack fa-fw stats-icon">
                                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                                </span>
                                                <span class="stats-total">4.3k</span>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                                            <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>
                                        </div>
                                        <div class="timeline-comment-box">
                                            <div class="user"><img src="https://bootdey.com/img/Content/avatar/avatar3.png"></div>
                                            <div class="input">
                                                <form action="">
                                                <div class="input-group">
                                                    <input type="text" class="form-control rounded-corner" placeholder="Write a comment...">
                                                    <span class="input-group-btn p-l-10">
                                                    <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                                                    </span>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end timeline-body -->

                                </li>
                            @endforeach
                        </ul>
                        <!-- end timeline -->
                    </div>
                    <!-- end #profile-post tab -->
                </div>
                <!-- end tab-content -->
                </div>
                <!-- end profile-content -->
            </div>
        </div>
    </div>
    </div>
 </body>
</html>
