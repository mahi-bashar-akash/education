const apiRoutes = {

    /* --- --- --- --- admin auth --- --- --- --- */
    adminLogin: '/admin-secure/admin-auth/login',
    adminRegister: '/admin-secure/admin-auth/register',
    adminForget: '/admin-secure/admin-auth/forgot',
    adminReset: '/admin-secure/admin-auth/reset',

    /* --- --- --- --- admin profile --- --- --- --- */
    adminProfile: '/admin-secure/admin-profile/details',
    adminProfileUpdate: '/admin-secure/admin-profile/update',
    adminChangePassword: '/admin-secure/admin-profile/update/password',
    adminLogout: '/admin-secure/admin-profile/logout',

    /* --- --- --- --- user auth --- --- --- --- */
    userLogin: '/user-secure/user-auth/login',
    userRegister: '/user-secure/user-auth/register',
    userForget: '/user-secure/user-auth/forgot',
    userReset: '/user-secure/user-auth/reset',

    /* --- --- --- --- user profile --- --- --- --- */
    userProfile: '/user-secure/user-profile/details',
    userProfileUpdate: '/user-secure/user-profile/update',
    userChangePassword: '/user-secure/user-profile/update/password',
    userLogout: '/user-secure/user-profile/logout',

}

export default apiRoutes;
