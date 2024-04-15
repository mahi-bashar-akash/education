const apiRoutes = {

    /* --- --- --- --- admin - auth - access --- --- --- --- */
    adminLogin: '/admin-secure/admin-auth/login',
    adminRegister: '/admin-secure/admin-auth/register',
    adminForget: '/admin-secure/admin-auth/forgot',
    adminReset: '/admin-secure/admin-auth/reset',

    /* --- --- --- --- admin - profile --- --- --- --- */
    adminProfile: '/admin-secure/admin-profile/details',
    adminProfileUpdate: '/admin-secure/admin-profile/update',
    adminChangePassword: '/admin-secure/admin-profile/update/password',
    adminLogout: '/admin-secure/admin-profile/logout',

    /* --- --- --- --- admin - department --- --- --- --- */
    departmentList: '/admin-secure/department/list',
    departmentCreate: '/admin-secure/department/create',
    departmentSingle: '/admin-secure/department/single',
    departmentUpdate: '/admin-secure/department/update',
    departmentDelete: '/admin-secure/department/delete',

    /* --- --- --- --- admin - professor --- --- --- --- */
    professorList: '/admin-secure/professor/list',
    professorCreate: '/admin-secure/professor/create',
    professorSingle: '/admin-secure/professor/single',
    professorUpdate: '/admin-secure/professor/update',
    professorDelete: '/admin-secure/professor/delete',

    /* --- --- --- --- admin - course --- --- --- --- */
    courseList: '/admin-secure/course/list',
    courseCreate: '/admin-secure/course/create',
    courseSingle: '/admin-secure/course/single',
    courseUpdate: '/admin-secure/course/update',
    courseDelete: '/admin-secure/course/delete',

    /* --- --- --- --- admin - student --- --- --- --- */
    studentList: '/admin-secure/student/list',
    studentCreate: '/admin-secure/student/create',
    studentSingle: '/admin-secure/student/single',
    studentUpdate: '/admin-secure/student/update',
    studentDelete: '/admin-secure/student/delete',

    /* --- --- --- --- user auth --- --- --- --- */
    userLogin: '/user-secure/user-auth/login',
    userRegister: '/user-secure/user-auth/register',
    userForget: '/user-secure/user-auth/forgot',
    userReset: '/user-secure/user-auth/reset',

    /* --- --- --- --- user profile --- --- --- --- */
    userProfile: '/user-secure/user-profile/details',
    userProfileUpdate: '/user-secure/user-profile/update',
    userChangePassword: '/user-secure/user-profile/update/password',
    userPaymentUpdate: '/user-secure/user-profile/update/payment',
    userLogout: '/user-secure/user-profile/logout',

}

export default apiRoutes;
