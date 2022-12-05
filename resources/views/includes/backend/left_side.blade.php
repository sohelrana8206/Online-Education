<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    @if(!empty(session('profile_pic')))
                        <?php $profile_pic = session('profile_pic'); ?>
                    @else
                        <?php $profile_pic = 'public/admin-assets/images/profile-pic.png'; ?>
                    @endif
                    <a href="#" class="media-left"><img src="{{asset($profile_pic)}}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{auth()->user()->name}}</span>
                        <div class="text-size-mini text-muted">
                            {{auth()->user()->email}}<br>
                            <strong><?=str_replace('"','',auth()->user()->roles->pluck('name'))?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{ request()->is('*dashboard*') ? 'active' : '' }}"><a href="{{url('dashboard')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <!-- /main -->

                    @if(!empty(session('referral_code')))
                        <li class="navigation-header"><span>MY REFERRALS</span> <i class="icon-menu" title="Page kits"></i></li>
                        <li>
                            <a href="#"><i class="icon-users2"></i> <span>My Referral Information</span></a>
                            <ul>
                                <li class="{{ request()->is('*myReferredStudent*') ? 'active' : '' }}"><a href="{{url('myReferredStudent')}}"><i class="icon-list-unordered"></i> <span>My Referred Student List</span></a></li>
                                <li class="{{ request()->is('*myReferral*') ? 'active' : '' }}"><a href="{{url('myReferral')}}"><i class="icon-list-unordered"></i> <span>My Referral</span></a></li>
                            </ul>
                        </li>
                    @endif

                    @can('course-list')
                            <!-- TEACHERS COURSE RELATED DATA -->
                        <li class="navigation-header"><span>COURSE RELATED INFO</span> <i class="icon-menu" title="Page kits"></i></li>
                        <li>
                            <a href="#"><i class="icon-book3"></i> <span>Course Information</span></a>
                            <ul>
                                @can('course-list')
                                <li class="{{ request()->is('*courseList*') ? 'active' : '' }}"><a href="{{url('courseList')}}"><i class="icon-list-unordered"></i> <span>Course List</span></a></li>
                                @endcan

                                @can('incomplete-course')
                                <li class="{{ request()->is('incompleteCourse') ? 'active' : '' }}"><a href="{{url('incompleteCourse')}}"><i class="icon-list-unordered"></i> <span>Incomplete Course</span></a></li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="icon-book3"></i> <span>Course Package Information</span></a>
                            <ul>
                                @can('course-package-list')
                                <li class="{{ request()->is('*coursePackageList*') ? 'active' : '' }}"><a href="{{url('coursePackageList')}}"><i class="icon-list-unordered"></i> <span>Course Package List</span></a></li>
                                @endcan

                                @can('incomplete-package')
                                <li class="{{ request()->is('incompletePackage') ? 'active' : '' }}"><a href="{{url('incompletePackage')}}"><i class="icon-list-unordered"></i> <span>Incomplete Package</span></a></li>
                                @endcan
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="icon-library2"></i> <span>Library</span></a>
                            <ul>
                                @can('pdf-library')
                                <li class="{{ request()->is('*pdfLibrary*') ? 'active' : '' }}"><a href="{{url('pdfLibrary')}}"><i class="icon-list-unordered"></i> <span>PDF Library List</span></a></li>
                                @endcan

                                @can('video-library')
                                <li class="{{ request()->is('*videoLibrary*') ? 'active' : '' }}"><a href="{{url('videoLibrary')}}"><i class="icon-list-unordered"></i> <span>Video Library List</span></a></li>
                                @endcan

                                @can('free-quiz-setting')
                                <li class="{{ request()->is('*freeQuizSetting*') ? 'active' : '' }}"><a href="{{url('freeQuizSetting')}}"><i class="icon-list-unordered"></i> <span>Free Quiz Setting</span></a></li>
                                @endcan
                            </ul>
                        </li>

                            <!-- TEACHERS COURSE RELATED DATA  -->
                    @endcan

                    @can('teacher-list','student-list','agent-list')
                    <!-- ACADEMICS -->
                    <li class="navigation-header"><span>ACADEMICS</span> <i class="icon-menu" title="Page kits"></i></li>
                    <li>
                        <a href="#"><i class="icon-grid"></i> <span>Course Category</span></a>
                        <ul>
                            @can('course-primary-category-list')
                            <li class="{{ request()->is('*coursePrimaryCategory*') ? 'active' : '' }}"><a href="{{url('coursePrimaryCategory')}}"><i class="icon-list-unordered"></i> <span>Primary Category</span></a></li>
                            @endcan

                            @can('course-secondary-category-list')
                            <li class="{{ request()->is('*courseSecondaryCategory*') ? 'active' : '' }}"><a href="{{url('courseSecondaryCategory')}}"><i class="icon-list-unordered"></i> <span>Secondary Category</span></a></li>
                            @endcan

                            @can('course-sub-category-list')
                            <li class="{{ request()->is('*courseSubCategory*') ? 'active' : '' }}"><a href="{{url('courseSubCategory')}}"><i class="icon-list-unordered"></i> <span>Sub Category</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-library2"></i> <span>Institution Type</span></a>
                        <ul>
                            @can('institution-type-list')
                            <li class="{{ request()->is('*institutionType*') ? 'active' : '' }}"><a href="{{url('institutionType')}}"><i class="icon-list-unordered"></i> <span>Institution Type List</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-users2"></i> <span>Teachers Information</span></a>
                        <ul>
                            @can('pending-teacher-list')
                            <li class="{{ request()->is('*pendingTeacher*') ? 'active' : '' }}"><a href="{{url('pendingTeacher')}}"><i class="icon-list-unordered"></i> <span>Pending Teacher List</span></a></li>
                            @endcan

                            @can('teacher-list')
                            <li class="{{ request()->is('*teachersList*') ? 'active' : '' }}"><a href="{{url('teachersList')}}"><i class="icon-list-unordered"></i> <span>Teacher List</span></a></li>
                            @endcan

                            @can('suspended-teacher-list')
                            <li class="{{ request()->is('*suspendedTeachersList*') ? 'active' : '' }}"><a href="{{url('suspendedTeachersList')}}"><i class="icon-list-unordered"></i> <span>Suspended Teacher List</span></a></li>
                            @endcan

                            @can('pending-course-list')
                            <li class="{{ request()->is('pendingCourse') ? 'active' : '' }}"><a href="{{url('pendingCourse')}}"><i class="icon-list-unordered"></i> <span>Pending Course List</span></a></li>
                            @endcan

                            @can('active-course-list')
                            <li class="{{ request()->is('activeCourse') ? 'active' : '' }}"><a href="{{url('activeCourse')}}"><i class="icon-list-unordered"></i> <span>Active Course List</span></a></li>
                            @endcan

                            @can('inactive-course-list')
                            <li class="{{ request()->is('inactiveCourse') ? 'active' : '' }}"><a href="{{url('inactiveCourse')}}"><i class="icon-list-unordered"></i> <span>Inactive/Rejected Course</span></a></li>
                            @endcan

                            @can('pending-course-package-list')
                            <li class="{{ request()->is('pendingCoursePackage') ? 'active' : '' }}"><a href="{{url('pendingCoursePackage')}}"><i class="icon-list-unordered"></i> <span>Pending Course Package</span></a></li>
                            @endcan

                            @can('active-course-package-list')
                            <li class="{{ request()->is('activeCoursePackage') ? 'active' : '' }}"><a href="{{url('activeCoursePackage')}}"><i class="icon-list-unordered"></i> <span>Active Course Package</span></a></li>
                            @endcan

                            @can('inactive-course-package-list')
                            <li class="{{ request()->is('inactiveCoursePackage') ? 'active' : '' }}"><a href="{{url('inactiveCoursePackage')}}"><i class="icon-list-unordered"></i> <span>Inactive/Rejected Package</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-book3"></i> <span>Course Activities</span></a>
                        <ul>
                            @can('course-status')
                            <li class="{{ request()->is('courseStatus') ? 'active' : '' }}"><a href="{{url('courseStatus')}}"><i class="icon-list-unordered"></i> <span>Course Status</span></a></li>
                            @endcan

                            @can('package-status')
                            <li class="{{ request()->is('packageStatus') ? 'active' : '' }}"><a href="{{url('packageStatus')}}"><i class="icon-list-unordered"></i> <span>Package Status</span></a></li>
                            @endcan

                            @can('course-completed-student')
                            <li class="{{ request()->is('courseCompletedStudent') ? 'active' : '' }}"><a href="{{url('courseCompletedStudent')}}"><i class="icon-list-unordered"></i> <span>Course Completed Student</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-users"></i> <span>Students Information</span></a>
                        <ul>
                            @can('student-list')
                            <li class="{{ request()->is('*studentsList*') ? 'active' : '' }}"><a href="{{url('studentsList')}}"><i class="icon-list-unordered"></i> <span>Students List</span></a></li>
                            @endcan

                            @can('suspended-student-list')
                            <li class="{{ request()->is('*suspendedStudentsList*') ? 'active' : '' }}"><a href="{{url('suspendedStudentsList')}}"><i class="icon-list-unordered"></i> <span>Suspended Students List</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-user-tie"></i> <span>Agents Information</span></a>
                        <ul>
                            @can('pending-agent-list')
                            <li class="{{ request()->is('*pendingAgent*') ? 'active' : '' }}"><a href="{{url('pendingAgent')}}"><i class="icon-list-unordered"></i> <span>Pending Agent List</span></a></li>
                            @endcan

                            @can('agent-list')
                            <li class="{{ request()->is('*agentsList*') ? 'active' : '' }}"><a href="{{url('agentsList')}}"><i class="icon-list-unordered"></i> <span>Agents List</span></a></li>
                            @endcan

                            @can('suspended-agent-list')
                            <li class="{{ request()->is('*suspendedAgentsList*') ? 'active' : '' }}"><a href="{{url('suspendedAgentsList')}}"><i class="icon-list-unordered"></i> <span>Suspended Agents List</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-library2"></i> <span>Library</span></a>
                        <ul>
                            @can('library-pdf-admin')
                            <li class="{{ request()->is('libraryPdf') ? 'active' : '' }}"><a href="{{url('libraryPdf')}}"><i class="icon-list-unordered"></i> <span>PDF Library</span></a></li>
                            @endcan

                            @can('library-video-admin')
                            <li class="{{ request()->is('libraryVideo') ? 'active' : '' }}"><a href="{{url('libraryVideo')}}"><i class="icon-list-unordered"></i> <span>Video Library</span></a></li>
                            @endcan

                            @can('free-quiz-admin')
                            <li class="{{ request()->is('libraryFreeQuiz') ? 'active' : '' }}"><a href="{{url('libraryFreeQuiz')}}"><i class="icon-list-unordered"></i> <span>Free Quiz</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-comment-discussion"></i> <span>Notification</span></a>
                        <ul>
                            @can('notification-list')
                            <li class="{{ request()->is('*notificationList*') ? 'active' : '' }}"><a href="{{url('notificationList')}}"><i class="icon-list-unordered"></i> <span>Notification List</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-users"></i> <span>Student Reviews</span></a>
                        <ul>
                            @can('course-review')
                            <li class="{{ request()->is('studentsCourseReview') ? 'active' : '' }}"><a href="{{url('studentsCourseReview')}}"><i class="icon-list-unordered"></i> <span>Course Review</span></a></li>
                            @endcan

                            @can('teacher-review')
                            <li class="{{ request()->is('studentsTeacherReview') ? 'active' : '' }}"><a href="{{url('studentsTeacherReview')}}"><i class="icon-list-unordered"></i> <span>Teacher Review</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <!-- ACADEMICS -->
                    @endcan

                    @can('referred-student-list')
                    <!-- REFERRAL DATA -->
                    <li class="navigation-header"><span>REFERRAL INFO</span> <i class="icon-menu" title="Page kits"></i></li>
                    <li>
                        <a href="#"><i class="icon-users2"></i> <span>Referral Information</span></a>
                        <ul>
                            @can('referral-package-list')
                            <li class="{{ request()->is('*referralPackage*') ? 'active' : '' }}"><a href="{{url('referralPackage')}}"><i class="icon-list-unordered"></i> <span>Referral Package List</span></a></li>
                            @endcan

                            @can('referral-agent-list')
                            <li class="{{ request()->is('*referralAgent*') ? 'active' : '' }}"><a href="{{url('referralAgent')}}"><i class="icon-list-unordered"></i> <span>Referral Agent List</span></a></li>
                            @endcan

                            @can('referred-student-list')
                            <li class="{{ request()->is('*referredStudent*') ? 'active' : '' }}"><a href="{{url('referredStudent')}}"><i class="icon-list-unordered"></i> <span>Referred Student List</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <!-- REFERRAL DATA  -->
                    @endcan

                    @can('role-list','permission-list')
                    <!-- SETTINGS -->
                    <li class="navigation-header"><span>SETTINGS</span> <i class="icon-menu" title="Page kits"></i></li>
                    <li>
                        <a href="#"><i class="icon-lock"></i> <span>Access Control List (ACL)</span></a>
                        <ul>
                            @can('role-list')
                            <li class="{{ request()->is('*roles*') ? 'active' : '' }}"><a href="{{route('roles.index')}}"><i class="icon-list-unordered"></i> <span>Role List</span></a></li>
                            @endcan
                            @can('permission-list')
                            <li class="{{ request()->is('*permissions*') ? 'active' : '' }}"><a href="{{route('permissions.index')}}"><i class="icon-list-unordered"></i> <span>Permission List</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    <!-- SETTINGS -->
                    @endcan

                    @can('user-list')
                    <li>
                        <a href="#"><i class="icon-people"></i> <span>User Settings</span></a>
                        <ul>
                            @can('user-list')
                            <li class="{{ request()->is('*users*') ? 'active' : '' }}"><a href="{{route('users.index')}}"><i class="icon-list-unordered"></i> <span>User List</span></a></li>
                            @endcan
                            @can('activity-log')
                            <li class="{{ request()->is('*activitiesLog*') ? 'active' : '' }}"><a href="{{url('activitiesLog')}}"><i class="icon-list-unordered"></i> <span>User Activities Log</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                    @can('accounts-finance')
                        <li class="navigation-header"><span>ACCOUNTS AND FINANCE</span> <i class="icon-menu" title="Page kits"></i></li>
                    <li>
                        <a href="#"><i class="fa fa-money"></i> <span>Accounts & Finance</span></a>
                        <ul>
                            @can('account-summery-agent')
                                <li class="{{ request()->is('accountSummeryAgent') ? 'active' : '' }}"><a href="{{url('accountSummeryAgent')}}"><i class="icon-list-unordered"></i> <span>Account's Summery</span></a></li>
                            @endcan
                            @can('account-summery-teacher')
                                <li class="{{ request()->is('accountSummeryTeacher') ? 'active' : '' }}"><a href="{{url('accountSummeryTeacher')}}"><i class="icon-list-unordered"></i> <span>Account's Summery</span></a></li>
                            @endcan
                            @can('account-summery')
                                <li class="{{ request()->is('accountSummery') ? 'active' : '' }}"><a href="{{url('accountSummery')}}"><i class="icon-list-unordered"></i> <span>Account's Summery</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->