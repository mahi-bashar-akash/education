<template>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <div class="breadcrumb bg-white shadow p-3 rounded-3">
            <div class="breadcrumb-item">
                <router-link :to="{name: 'profile'}" class="text-decoration-none text-light-gray-hover">
                    Profile
                </router-link>
            </div>
            <div class="breadcrumb-item">
                <router-link :to="{name: 'myCourse'}" class="text-decoration-none text-light-gray-hover">
                    My course
                </router-link>
            </div>
        </div>
    </nav>

    <div class="profile-no-data-card bg-white shadow scrollbar p-3 rounded-3">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item mb-3 shadow border-0 rounded-0" v-for="each in courseDataList">
                <h2 class="accordion-header">
                    <button class="accordion-button shadow-none rounded-0 fw-medium bg-theme-hover" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+each.id" aria-expanded="true" :aria-controls="'collapse'+each.id">
                        {{each.courseName}}
                    </button>
                </h2>
                <div :id="'collapse'+each.id" class="accordion-collapse collapse" data-bs-parent="#accordionExample" v-for="subEach in each.lesson">
                    <div class="accordion-body py-2">
                        <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover d-block line-height-2">
                            lesson {{subEach.id}} : {{subEach.lessonName}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <noDataFound/>

</template>

<script>
import noDataFound from "../components/no-data-found.vue";

export default {
    components: {
        noDataFound,
    },
    data() {
        return {
            courseDataList: [
                { id: '1', courseName: 'Business Administration',
                    lesson: [
                        { id: '1', lessonName: 'Introduction to Business' },
                        { id: '2', lessonName: 'Business Communication' },
                        { id: '3', lessonName: 'International Business' },
                        { id: '4', lessonName: 'Business Environment' },
                        { id: '5', lessonName: 'Research Methodology for Business' },
                        { id: '6', lessonName: 'Introduction to Financial Accounting' },
                        { id: '7', lessonName: 'Introduction to Management Accounting' },
                        { id: '8', lessonName: 'Taxation' },
                        { id: '9', lessonName: 'Principles of Management' },
                        { id: '10', lessonName: 'Project Management' },
                        { id: '11', lessonName: 'Entrepreneurial Policies & Practices' },
                        { id: '12', lessonName: 'Business Policy & Strategy' },
                        { id: '13', lessonName: 'Introduction to Finance' },
                        { id: '14', lessonName: 'Managerial Finance' },
                        { id: '15', lessonName: 'Banking and Insurance' },
                        { id: '16', lessonName: 'Introduction to Marketing' },
                        { id: '17', lessonName: 'Marketing Management' },
                        { id: '18', lessonName: 'Micro Economics' },
                        { id: '19', lessonName: 'Macro Economics' },
                        { id: '20', lessonName: 'Human Resource Management' },
                        { id: '21', lessonName: 'Organizational Behavior' },
                        { id: '22', lessonName: 'English Language I' },
                        { id: '23', lessonName: 'English Language II' },
                        { id: '24', lessonName: 'Introduction to Computer Science' },
                        { id: '25', lessonName: 'Computer Application' },
                        { id: '26', lessonName: 'Management Information System' },
                        { id: '27', lessonName: 'Production & Operations Management' },
                        { id: '28', lessonName: 'Business Law' },
                        { id: '29', lessonName: 'Fundamentals of Mathematics' },
                        { id: '30', lessonName: 'Intermediate Accounting' },
                        { id: '31', lessonName: 'Principles of Auditing' },
                        { id: '32', lessonName: 'Advanced Management Accounting' },
                        { id: '33', lessonName: 'Accounting Information System' },
                        { id: '34', lessonName: 'Security Analysis and Portfolio Management' },
                        { id: '35', lessonName: 'Advanced Accounting' },
                        { id: '36', lessonName: 'Accounting Theory' },
                        { id: '37', lessonName: 'Micro Finance' },
                    ],
                },
                { id: '2', courseName: 'Creative Graphic Design',
                    lesson: [
                        { id: '1', lessonName: 'Professional Presentation' },
                        { id: '2', lessonName: 'Raster To Vector' },
                        { id: '3', lessonName: 'Invoice Template Design' },
                        { id: '4', lessonName: 'Letterhead Design' },
                        { id: '5', lessonName: 'Brochure Layout' },
                        { id: '6', lessonName: 'Logo Design' },
                        { id: '7', lessonName: 'Desk & Wall Calendar Design' },
                        { id: '8', lessonName: 'Product Packaging' },
                        { id: '9', lessonName: 'Certificate Template Design' },
                        { id: '10', lessonName: 'T-Shirt Design' },
                        { id: '11', lessonName: 'Resume & Cover Letter Design' },
                        { id: '12', lessonName: 'Landscape Design' },
                        { id: '13', lessonName: 'Image Clipping' },
                        { id: '14', lessonName: 'Neck Joint' },
                        { id: '15', lessonName: 'Banner / Poster Design' },
                        { id: '16', lessonName: 'Magazine Design' },
                        { id: '17', lessonName: 'Web Banner Design' },
                        { id: '18', lessonName: 'Web UI Design' },
                    ],
                },
                { id: '3', courseName: 'FullStack Web Developer',
                    lesson: [
                        { id: '1', lessonName: 'HTML5' },
                        { id: '2', lessonName: 'CSS3' },
                        { id: '3', lessonName: 'SCSS' },
                        { id: '4', lessonName: 'Design To HTML' },
                        { id: '5', lessonName: 'CSS3 Animation Effect' },
                        { id: '6', lessonName: 'JavaScript' },
                        { id: '7', lessonName: 'JQuery' },
                        { id: '8', lessonName: 'Basic of Vue.js' },
                        { id: '9', lessonName: 'JQuery' },
                        { id: '10', lessonName: 'Bootstrap Latest Version' },
                        { id: '11', lessonName: 'Marketplace Related Classes' },
                        { id: '12', lessonName: 'Concept Of Static & Dynamic Website' },
                        { id: '13', lessonName: 'Raw PHP Coding' },
                        { id: '14', lessonName: 'Object Oriented Programming (OOP) PHP' },
                        { id: '15', lessonName: 'Dynamic Website Development' },
                        { id: '16', lessonName: 'Admin Panel Integration' },
                        { id: '17', lessonName: 'Laravel PHP Framework' },
                        { id: '18', lessonName: 'Ajax' },
                        { id: '19', lessonName: 'Payment Gateway' },
                        { id: '20', lessonName: 'ECommerce Project With Laravel Vue API' },
                    ],
                },
                { id: '4', courseName: 'Digital Marketing',
                    lesson: [
                        { id: '1', lessonName: 'Niche Selection' },
                        { id: '2', lessonName: 'Keyword Research (AdSense, Affiliate, Service)' },
                        { id: '3', lessonName: 'Competitor Analysis & Website Audit' },
                        { id: '4', lessonName: 'On-Site Optimization' },
                        { id: '5', lessonName: 'On-Page Optimization' },
                        { id: '6', lessonName: 'Article Writing Strategy' },
                        { id: '7', lessonName: 'Google Webmaster Tool & Analytics' },
                        { id: '8', lessonName: 'Off-Page SEO' },
                        { id: '9', lessonName: 'Facebook Advanced Audience Targeting' },
                        { id: '10', lessonName: 'Facebook Ads Quality Maintenance' },
                        { id: '11', lessonName: 'Facebook Paid Campaign' },
                        { id: '12', lessonName: 'Facebook Pixel & Retargeting' },
                        { id: '13', lessonName: 'YouTube Competitor Analysis' },
                        { id: '14', lessonName: 'YouTube Channel & Video Optimization' },
                        { id: '15', lessonName: 'YouTube Monetization' },
                        { id: '16', lessonName: 'LinkedIn Marketing' },
                    ],
                }
            ]
        }
    },
    mounted() {  },
    methods: {  }
}

</script>
