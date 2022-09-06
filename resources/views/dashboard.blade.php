@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Users</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{count($users)}}">0</span></h2>
                                <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs. previous month</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                        <i data-feather="users" class="text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Tasks</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{count($tasks)}}">0</span></h2>
                                <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 3.96 % </span> vs. previous month</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                        <i data-feather="activity" class="text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row-->


        <div class="row">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Users</h4>
                        {{-- <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted">02 Nov 2021 to 31 Dec 2021<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                        </div> --}}
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="text-muted">
                                        <th scope="col">User ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">User Type</th>
                                        {{-- <th scope="col">Task Count</th> --}}
                                        {{-- <th scope="col">Date Joined</th> --}}
                                    </tr>
                                </thead>

                                <tbody >
                                    @forelse($users as $user)
                                    <tr onclick="viewUser({{$user->id}})">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><span class="badge badge-soft-success p-2">{{$user->user_type}}</span></td>
                                        {{-- <td>
                                            <div class="text-nowrap">{{count($user->task)}}</div>
                                        </td> --}}
                                        {{-- <td>rrr</td> --}}
                                    </tr>
                                    @empty
                                    <h1>No Users Yet</h1>
                                    @endforelse
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-5">
                <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">My Tasks</h4>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted"><i class="ri-settings-4-line align-middle me-1 fs-15"></i>Settings</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body p-0">

                        <div class="align-items-center p-3 justify-content-between d-flex">
                            <button type="button" class="btn btn-sm btn-success"><i class="ri-add-line align-middle me-1"></i> Add Task</button>
                        </div><!-- end card header -->

                        <div data-simplebar style="max-height: 219px;">
                            <ul class="list-group list-group-flush border-dashed px-3">
                                @forelse($tasks as $task)
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="form-check ps-0 flex-sharink-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_one">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_one">{{$task->title}}</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">Due Date: {{$task->due_date}}</p>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="d-flex align-items-start">
                                        <div class="form-check ps-0 flex-sharink-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_one">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_one">No Tasks yet</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">Not Yet</p>
                                        </div>
                                    </div>
                                </li>
                                @endforelse
                            </ul><!-- end ul -->
                        </div>
                        <div class="p-3 pt-2">
                            <a href="javascript:void(0);" class="text-muted text-decoration-underline">Show more...</a>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

    </div>
</div>
<script>
    function viewUser(id)
    {
        window.location = "/view-user/" + id
    }
</script>
@endsection