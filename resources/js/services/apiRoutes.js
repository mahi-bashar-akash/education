const adminApi = '/admin-secure';
const userApi = '/user-secure';

const apiRoutes = {

    /* --- --- --- --- admin - auth - access --- --- --- --- */
    adminLogin: adminApi + '/admin-auth/login',
    adminRegister: adminApi + '/admin-auth/register',
    adminForget: adminApi + '/admin-auth/forgot',
    adminReset: adminApi + '/admin-auth/reset',

    /* --- --- --- --- admin - profile --- --- --- --- */
    adminProfile: adminApi + '/admin-profile/details',
    adminProfileUpdate: adminApi + '/admin-profile/update',
    adminChangePassword: adminApi + '/admin-profile/update/password',
    adminLogout: adminApi + '/admin-profile/logout',

    /* --- --- --- --- admin - event --- --- --- --- */
    eventList: adminApi + '/event/list',
    eventCreate: adminApi + '/event/create',
    eventSingle: adminApi + '/event/single',
    eventUpdate: adminApi + '/event/update',
    eventDelete: adminApi + '/event/delete',

    /* --- --- --- --- admin - department --- --- --- --- */
    departmentList: adminApi + '/department/list',
    departmentCreate: adminApi + '/department/create',
    departmentSingle: adminApi + '/department/single',
    departmentUpdate: adminApi + '/department/update',
    departmentDelete: adminApi + '/department/delete',

    /* --- --- --- --- admin - professor --- --- --- --- */
    professorList: adminApi + '/professor/list',
    professorCreate: adminApi + '/professor/create',
    professorSingle: adminApi + '/professor/single',
    professorUpdate: adminApi + '/professor/update',
    professorDelete: adminApi + '/professor/delete',

    /* --- --- --- --- admin - course --- --- --- --- */
    courseList: adminApi + '/course/list',
    courseCreate: adminApi + '/course/create',
    courseSingle: adminApi + '/course/single',
    courseUpdate: adminApi + '/course/update',
    courseDelete: adminApi + '/course/delete',

    /* --- --- --- --- admin - blog --- --- --- --- */
    blogList: adminApi + '/blog/list',
    blogCreate: adminApi + '/blog/create',
    blogSingle: adminApi + '/blog/single',
    blogUpdate: adminApi + '/blog/update',
    blogDelete: adminApi + '/blog/delete',

    /* --- --- --- --- admin - student --- --- --- --- */
    studentList: adminApi + '/student/list',
    studentCreate: adminApi + '/student/create',
    studentSingle: adminApi + '/student/single',
    studentUpdate: adminApi + '/student/update',
    studentDelete: adminApi + '/student/delete',

    /* --- --- --- --- admin - library asset --- --- --- --- */
    libraryAssetList: adminApi + '/library/asset/list',
    libraryAssetCreate: adminApi + '/library/asset/create',
    libraryAssetSingle: adminApi + '/library/asset/single',
    libraryAssetUpdate: adminApi + '/library/asset/update',
    libraryAssetDelete: adminApi + '/library/asset/delete',

    /* --- --- --- --- admin - stuff --- --- --- --- */
    stuffList: adminApi + '/stuff/list',
    stuffCreate: adminApi + '/stuff/create',
    stuffSingle: adminApi + '/stuff/single',
    stuffUpdate: adminApi + '/stuff/update',
    stuffDelete: adminApi + '/stuff/delete',

    /* --- --- --- --- admin - holiday --- --- --- --- */
    holidayList: adminApi + '/holiday/list',
    holidayCreate: adminApi + '/holiday/create',
    holidaySingle: adminApi + '/holiday/single',
    holidayUpdate: adminApi + '/holiday/update',
    holidayDelete: adminApi + '/holiday/delete',

    /* --- --- --- --- admin - fees --- --- --- --- */
    feesList: adminApi + '/fees/list',
    feesCreate: adminApi + '/fees/create',
    feesSingle: adminApi + '/fees/single',
    feesUpdate: adminApi + '/fees/update',
    feesDelete: adminApi + '/fees/delete',

    /* --- --- --- --- admin - fees types --- --- --- --- */
    feesTypesList: adminApi + '/fees/types/list',
    feesTypesCreate: adminApi + '/fees/types/create',
    feesTypesSingle: adminApi + '/fees/types/single',
    feesTypesUpdate: adminApi + '/fees/types/update',
    feesTypesDelete: adminApi + '/fees/types/delete',

    /* --- --- --- --- admin - payment types --- --- --- --- */
    paymentTypesList: adminApi + '/payment/types/list',
    paymentTypesCreate: adminApi + '/payment/types/create',
    paymentTypesSingle: adminApi + '/payment/types/single',
    paymentTypesUpdate: adminApi + '/payment/types/update',
    paymentTypesDelete: adminApi + '/payment/types/delete',

    /* --- --- --- --- admin - payment status --- --- --- --- */
    paymentStatusList: adminApi + '/payment/status/list',
    paymentStatusCreate: adminApi + '/payment/status/create',
    paymentStatusSingle: adminApi + '/payment/status/single',
    paymentStatusUpdate: adminApi + '/payment/status/update',
    paymentStatusDelete: adminApi + '/payment/status/delete',

    /* --- --- --- --- admin - payment status --- --- --- --- */
    faqList: adminApi + '/faq/list',
    faqCreate: adminApi + '/faq/create',
    faqSingle: adminApi + '/faq/single',
    faqUpdate: adminApi + '/faq/update',
    faqDelete: adminApi + '/faq/delete',

    /* --- --- --- --- admin - file upload --- --- --- --- */
    fileUpload: adminApi + '/file/upload',
    fileDelete: adminApi + '/file/delete',

    /* --- --- --- --- user auth --- --- --- --- */
    userLogin: userApi + '/user-auth/login',
    userRegister: userApi + '/user-auth/register',
    userForget: userApi + '/user-auth/forgot',
    userReset: userApi + '/user-auth/reset',

    /* --- --- --- --- user profile --- --- --- --- */
    userProfile: userApi + '/user-profile/details',
    userProfileUpdate: userApi + '/user-profile/update',
    userChangePassword: userApi + '/user-profile/update/password',
    userPaymentUpdate: userApi + '/user-profile/update/payment',
    userLogout: userApi + '/user-profile/logout',

}

export default apiRoutes;
