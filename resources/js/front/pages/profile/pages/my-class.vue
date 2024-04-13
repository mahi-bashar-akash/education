<template>

    <div class="d-flex justify-content-between align-items-center bg-white shadow px-4 mb-3 rounded-3 hpx-60">

        <BreadcrumbContent :items="BreadcrumbItems"/>

        <span class="spinner-border spinner-border wpx-15 hpx-15 me-2" aria-hidden="true" v-if="loading"></span>

        <div class="dropdown" v-if="!loading">
            <button type="button" class="btn-icon rounded-circle wpx-30 hpx-30" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-plus-lg"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end mt-3 p-1 overflow-hidden rounded-3 border">
                <li>
                    <button type="button" class="dropdown-item px-3 py-2" @click="openJoinClassRoom">
                        Join class room
                    </button>
                </li>
            </ul>
        </div>

    </div>

    <div class="profile-content bg-white shadow scrollbar p-3 rounded-3" v-if="!loading && classRoomDataList.length > 0">

        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
            <div class="p-3" v-for="each in classRoomDataList">
                <div class="card border rounded-3">
                    <div class="position-relative">
                        <img :src="each.filePath" class="img-fluid hpx-150 object-fit-cover" alt="classroom bg">
                        <div class="position-absolute top-0 start-0 p-3 text-white fs-5">
                            {{ each.courseDetails.course_name }}
                        </div>
                    </div>
                    <div class="hpx-100 rounded-bottom-3 d-flex justify-content-end align-items-end p-3">
                        <button type="button" class="btn btn-outline-theme rounded-circle me-2 wpx-40 hpx-40 d-flex justify-content-center align-items-center" @click="openProfessorDetailsModal(each)">
                            <i class="bi bi-person"></i>
                        </button>
                        <button type="button" class="btn btn-outline-theme rounded-circle wpx-40 hpx-40 d-flex justify-content-center align-items-center" @click="goToCourseDetails(each)">
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <pagination v-if="!loading && classRoomDataList.length > 0"/>

    <noDataFound v-if="!loading && classRoomDataList.length === 0"/>

    <preloader v-if="loading"/>

    <div class="modal fade" id="joinClassRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Join class room
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="closeJoinClassRoom"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="form-group">
                        <label for="class-code" class="form-label">Class code</label>
                        <input id="class-code" type="text" name="class-code" class="form-control" required autocomplete="new-joining-code" placeholder="Class code">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-90" @click="closeJoinClassRoom">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-90">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="professorDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Professor details
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="closeProfessorDetailsModal"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="mb-3">
                        <div class="fw-bold mb-2"> Professor name: </div>
                        <div class="text-light-gray-hover"> {{professor_query.name}} </div>
                    </div>
                    <div class="mb-3">
                        <div class="fw-bold mb-2"> Phone number: </div>
                        <div class="text-light-gray-hover"> {{professor_query.phone}} </div>
                    </div>
                    <div class="mb-3">
                        <div class="fw-bold mb-2"> Email: </div>
                        <div class="text-light-gray-hover"> {{professor_query.email}} </div>
                    </div>
                    <div class="mb-3">
                        <div class="fw-bold mb-2"> Professor code: </div>
                        <div class="text-light-gray-hover"> {{professor_query.code}} </div>
                    </div>
                    <div>
                        <div class="fw-bold mb-2"> Certified: </div>
                        <div class="text-light-gray-hover"> {{professor_query.certification}} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import noDataFound from "../components/no-data-found.vue";
import preloader from "../components/preloader.vue";
import BreadcrumbContent from "../components/breadcrumb.vue";
import pagination from "../components/pagination.vue";
export default {
    components: {
        BreadcrumbContent, noDataFound, preloader, pagination
    },
    data(){
        return{
            BreadcrumbItems: [
                { title: 'Profile', route: 'profile' },
                { title: 'My class room', route: 'myClassRoom' },
            ],
            loading: true,
            professor_query: {},
            classRoomDataList: [
                {
                    id: '1',
                    filePath: '/images/classroom-bg/bg-classroom-1.jpg',
                    professor_data: {
                        name: 'Mr. Ariful jorder arif',
                        email: 'mahibashar2023@gmail.com',
                        phone: '01753036144',
                        code: 'AJA',
                        certification: 'MBA, BBA'
                    },
                    courseDetails: {
                        course_name: 'Business Administration',
                        lesson_list: [
                            {id: '1', lessonName: 'Introduction to Business', duration: '' },
                            {id: '2', lessonName: 'Business Communication', duration: '' },
                            {id: '3', lessonName: 'International Business', duration: '' },
                            {id: '4', lessonName: 'Business Environment', duration: '' },
                            {id: '5', lessonName: 'Research Methodology for Business', duration: '' },
                            {id: '6', lessonName: 'Introduction to Financial Accounting', duration: '' },
                            {id: '7', lessonName: 'Introduction to Management Accounting', duration: '' },
                            {id: '8', lessonName: 'Taxation', duration: '' },
                            {id: '9', lessonName: 'Principles of Management', duration: '' },
                            {id: '10', lessonName: 'Project Management', duration: '' },
                            {id: '11', lessonName: 'Entrepreneurial Policies & Practices', duration: '' },
                            {id: '12', lessonName: 'Business Policy & Strategy', duration: '' },
                            {id: '13', lessonName: 'Introduction to Finance', duration: '' },
                            {id: '14', lessonName: 'Managerial Finance', duration: '' },
                            {id: '15', lessonName: 'Banking and Insurance', duration: '' },
                            {id: '16', lessonName: 'Introduction to Marketing', duration: '' },
                            {id: '17', lessonName: 'Marketing Management', duration: '' },
                            {id: '18', lessonName: 'Micro Economics', duration: '' },
                            {id: '19', lessonName: 'Macro Economics', duration: '' },
                            {id: '20', lessonName: 'Human Resource Management', duration: '' },
                            {id: '21', lessonName: 'Organizational Behavior', duration: '' },
                            {id: '22', lessonName: 'English Language I', duration: '' },
                            {id: '23', lessonName: 'English Language II', duration: '' },
                            {id: '24', lessonName: 'Introduction to Computer Science', duration: '' },
                            {id: '25', lessonName: 'Computer Application', duration: '' },
                            {id: '26', lessonName: 'Management Information System', duration: '' },
                            {id: '27', lessonName: 'Production & Operations Management', duration: '' },
                            {id: '28', lessonName: 'Business Law', duration: '' },
                            {id: '29', lessonName: 'Fundamentals of Mathematics', duration: '' },
                            {id: '30', lessonName: 'Intermediate Accounting', duration: '' },
                            {id: '31', lessonName: 'Principles of Auditing', duration: '' },
                            {id: '32', lessonName: 'Advanced Management Accounting', duration: '' },
                            {id: '33', lessonName: 'Accounting Information System', duration: '' },
                            {id: '34', lessonName: 'Security Analysis and Portfolio Management', duration: '' },
                            {id: '35', lessonName: 'Advanced Accounting', duration: '' },
                            {id: '36', lessonName: 'Accounting Theory', duration: '' },
                            {id: '37', lessonName: 'Micro Finance', duration: '' },
                        ],
                    },
                },
                {
                    id: '2',
                    filePath: '/images/classroom-bg/bg-classroom-2.jpg',
                    professor_data: {
                        name: 'Ms, Farzana Bashar Juthi',
                        email: 'farzanaJuthi@gmail.com',
                        phone: '01816923033',
                        code: 'FBJ',
                        certification: 'MBA, BBA'
                    },
                    courseDetails: {
                        course_name: 'Creative Graphic Design',
                        lesson: [
                            {id: '1', lessonName: 'Professional Presentation'},
                            {id: '2', lessonName: 'Raster To Vector'},
                            {id: '3', lessonName: 'Invoice Template Design'},
                            {id: '4', lessonName: 'Letterhead Design'},
                            {id: '5', lessonName: 'Brochure Layout'},
                            {id: '6', lessonName: 'Logo Design'},
                            {id: '7', lessonName: 'Desk & Wall Calendar Design'},
                            {id: '8', lessonName: 'Product Packaging'},
                            {id: '9', lessonName: 'Certificate Template Design'},
                            {id: '10', lessonName: 'T-Shirt Design'},
                            {id: '11', lessonName: 'Resume & Cover Letter Design'},
                            {id: '12', lessonName: 'Landscape Design'},
                            {id: '13', lessonName: 'Image Clipping'},
                            {id: '14', lessonName: 'Neck Joint'},
                            {id: '15', lessonName: 'Banner / Poster Design'},
                            {id: '16', lessonName: 'Magazine Design'},
                            {id: '17', lessonName: 'Web Banner Design'},
                            {id: '18', lessonName: 'Web UI Design'},
                        ],
                    },
                },
                {
                    id: '3',
                    filePath: '/images/classroom-bg/bg-classroom-3.jpg',
                    professor_data: {
                        name: 'Mr, Mahi Bashar Akash',
                        email: 'farzanaJuthi@gmail.com',
                        phone: '01400125289',
                        code: 'MBA',
                        certification: 'CSE, MSC'
                    },
                    courseDetails: {
                        course_name: 'FullStack Web Developer',
                        lesson: [
                            {id: '1', lessonName: 'HTML5'},
                            {id: '2', lessonName: 'CSS3'},
                            {id: '3', lessonName: 'SCSS'},
                            {id: '4', lessonName: 'Design To HTML'},
                            {id: '5', lessonName: 'CSS3 Animation Effect'},
                            {id: '6', lessonName: 'JavaScript'},
                            {id: '7', lessonName: 'JQuery'},
                            {id: '8', lessonName: 'Basic of Vue.js'},
                            {id: '9', lessonName: 'JQuery'},
                            {id: '10', lessonName: 'Bootstrap Latest Version'},
                            {id: '11', lessonName: 'Marketplace Related Classes'},
                            {id: '12', lessonName: 'Concept Of Static & Dynamic Website'},
                            {id: '13', lessonName: 'Raw PHP Coding'},
                            {id: '14', lessonName: 'Object Oriented Programming (OOP) PHP'},
                            {id: '15', lessonName: 'Dynamic Website Development'},
                            {id: '16', lessonName: 'Admin Panel Integration'},
                            {id: '17', lessonName: 'Laravel PHP Framework'},
                            {id: '18', lessonName: 'Ajax'},
                            {id: '19', lessonName: 'Payment Gateway'},
                            {id: '20', lessonName: 'E-commerce Project With Laravel Vue API'},
                        ],
                    },
                },
                {
                    id: '4',
                    filePath: '/images/classroom-bg/bg-classroom-4.jpg',
                    professor_data: {
                        name: 'Fatema Bashar aira',
                        email: 'FatemaBashar@gmail.com',
                        phone: 'xxxxxxxxxxx',
                        code: 'FBA',
                        certification: 'MBA, BBA'
                    },
                    courseDetails: {
                        course_name: 'Digital Marketing',
                        lesson: [
                            {id: '1', lessonName: 'Niche Selection'},
                            {id: '2', lessonName: 'Keyword Research (AdSense, Affiliate, Service)'},
                            {id: '3', lessonName: 'Competitor Analysis & Website Audit'},
                            {id: '4', lessonName: 'On-Site Optimization'},
                            {id: '5', lessonName: 'On-Page Optimization'},
                            {id: '6', lessonName: 'Article Writing Strategy'},
                            {id: '7', lessonName: 'Google Webmaster Tool & Analytics'},
                            {id: '8', lessonName: 'Off-Page SEO'},
                            {id: '9', lessonName: 'Facebook Advanced Audience Targeting'},
                            {id: '10', lessonName: 'Facebook Ads Quality Maintenance'},
                            {id: '11', lessonName: 'Facebook Paid Campaign'},
                            {id: '12', lessonName: 'Facebook Pixel & Retargeting'},
                            {id: '13', lessonName: 'YouTube Competitor Analysis'},
                            {id: '14', lessonName: 'YouTube Channel & Video Optimization'},
                            {id: '15', lessonName: 'YouTube Monetization'},
                            {id: '16', lessonName: 'LinkedIn Marketing'},
                        ],
                    },
                }
            ]
        }
    },
    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000)
    },
    methods: {

        /* Function to open join classroom */
        openJoinClassRoom() {
            const myModal = new bootstrap.Modal("#joinClassRoomModal", {keyboard: false});
            myModal.show();
        },

        /* Function to close join classroom */
        closeJoinClassRoom() {
            let myModalEl = document.getElementById('joinClassRoomModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to open join classroom */
        openProfessorDetailsModal(each) {
            this.professor_query = each.professor_data
            const myModal = new bootstrap.Modal("#professorDetailsModal", {keyboard: false});
            myModal.show();
        },

        /* Function to close join classroom */
        closeProfessorDetailsModal() {
            let myModalEl = document.getElementById('professorDetailsModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to push data into another route */
        goToCourseDetails() {
            this.$router.push( { name: 'myCourse' } );
        },

    }
}

</script>
