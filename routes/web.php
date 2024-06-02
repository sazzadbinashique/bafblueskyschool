<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');
// application-soft route
Route::get('/application-soft', [FrontendController::class, 'applicationSoft'])->name('application-soft');

Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('aboutUs');
Route::get('/overview', [FrontendController::class, 'overview'])->name('overview');
Route::get('/facilities', [FrontendController::class, 'facilities'])->name('facilities');
Route::get('/ongoingProject', [FrontendController::class, 'ongoingProject'])->name('ongoingProject');
Route::get('/futurePlan', [FrontendController::class, 'futurePlan'])->name('futurePlan');
Route::get('/administrativeBody', [FrontendController::class, 'administrativeBody'])->name('administrativeBody');
Route::get('/message', [FrontendController::class, 'message'])->name('message');

Route::get('/ourServices', [FrontendController::class, 'ourServices'])->name('ourServices');
Route::get('/educationProgram', [FrontendController::class, 'educationProgram'])->name('educationProgram');

Route::get('/admission', [FrontendController::class, 'admission'])->name('admission');
Route::get('/yearCalendar', [FrontendController::class, 'yearCalendar'])->name('yearCalendar');
Route::get('/photos', [FrontendController::class, 'photos'])->name('photos');
Route::get('/videos', [FrontendController::class, 'videos'])->name('videos');
Route::get('/prospectus', [FrontendController::class, 'prospectus'])->name('prospectus');

Route::get('/noticeBoard', [FrontendController::class, 'noticeBoard'])->name('noticeBoard');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('feedbackStore', 'frontend\FrontendController@feedbackStore')->name('feedbackStore');

Route::get('/noticeBoardDtls/{id}', [FrontendController::class, 'noticeBoardDtls'])->name('noticeBoardDtls');


// Route::get('/', 'FrontHomeController@index');


//Route::group(['prefix' => 'admin'], function () {
//
//    Auth::routes();
//});
Auth::routes();

/*
|--------------------------------------------------------------------------
|   Front End Route
|--------------------------------------------------------------------------
|   @musafirali
|   Front-end route for displaying All Information for User
|
*/

// Route::get('academic/{id}', 'AcademicNoticeController@allAcademicNotice');
// Route::get('admission/{id}', 'AdmissionNoticeController@allAdmissionNotice');


// //    Teaching Staff
// Route::get('/teachingstaff', 'TeachingstaffController@allShow')->name('teachingstaff');
// //    Non Teaching Staff
// Route::get('/nonteachingstaff', 'NonteachingstaffController@nonteachingstaff')->name('nonteachingstaff');
// //Image Gallery
// Route::get('gallery/{id}', 'ImageGalleryController@gallery');
// //Facility
// Route::get('facility/{id}', 'FacilityController@facility');

// //Notice Board
// Route::get('/notice', 'NoticeBoardController@allShow')->name('notice');
// //Chairman Message
// Route::get('/chairmanmessage', 'ChairmanMessageController@chairman')->name('chairmanmessage');
// //Principle Message
// Route::get('/principalmessage', 'PrincipleMessageController@principal')->name('principalmessage');
// Route::get('weoffer', 'WeOfferController@weoffer')->name('weoffer');
// Route::get('history', 'SchoolHistoryController@history')->name('history');
// Route::get('vision', 'VisionMissionAimController@vision')->name('vision');
// Route::get('committee', 'ManagingCommitteeController@committee')->name('committee');
// Route::get('contact', 'ContactInformationController@contact')->name('contact');
// Route::get('location', 'ContactInformationController@location')->name('location');
//Result
/*
|--------------------------------------------------------------------------
| Middle Wire  Routes
|--------------------------------------------------------------------------
|   @musafirali
|   This code defines a group of routes that require authentication middleware.
|   Managing information for front-end from Back
|   All Back end controller
|
*/
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'DashboardController@index');

    Route::resource('roles', 'RoleController');
    Route::get('roles/remove/{id}', 'RoleController@remove')->name('roles.remove');
    Route::resource('users', 'UserController');
    Route::get('users/remove/{id}', 'UserController@remove')->name('users.remove');

//    Teaching Staff
    Route::resource('teachingstaff-mgmt', 'TeachingstaffController');
    Route::get('teachingstaff-mgmt/remove/{id}', 'TeachingstaffController@remove')->name('teachingstaff-mgmt.remove');

//    Non Teaching Staff
    Route::resource('non-teachingstaff-mgmt', 'NonteachingstaffController');
    Route::get('non-teachingstaff-mgmt/remove/{id}', 'NonteachingstaffController@remove')->name('non-teachingstaff-mgmt.remove');

    //Image Gallery
    //Route::resource('imggallery-mgmt','ImageGalleryController');
    //Route::get('imggallery-mgmt/remove/{id}', 'ImageGalleryController@remove')->name('imggallery-mgmt.remove');

    Route::resource('facility-mgmt','FacilityController');
    Route::get('facility-mgmt/remove/{id}', 'FacilityController@remove')->name('facility-mgmt.remove');

    //Notice Board
    Route::resource('noticeboard-mgmt', 'NoticeBoardController');
    Route::get('noticeboard-mgmt/remove/{id}', 'NoticeBoardController@remove')->name('noticeboard-mgmt.remove');

     //Slide Image
     Route::resource('slideimage-mgmt', 'SlideimageController');
     Route::get('slideimage-mgmt/remove/{id}', 'SlideimageController@remove')->name('slideimage-mgmt.remove');

     //Special Education Image
     Route::resource('specialeducationprogram-mgmt', 'SpecialeducationprogramController');
     Route::get('specialeducationprogram-mgmt/remove/{id}', 'SpecialeducationprogramController@remove')->name('specialeducationprogram-mgmt.remove');

     //Our Home Facilities
     Route::resource('ourfacility-mgmt', 'OurfacilitController');
     Route::get('ourfacility-mgmt/remove/{id}', 'OurfacilitController@remove')->name('ourfacility-mgmt.remove');

     //Event
     Route::resource('event-mgmt', 'EventController');
     Route::get('event-mgmt/remove/{id}', 'EventController@remove')->name('event-mgmt.remove');

    //Chairmen Message
    Route::resource('chairmenmessage-mgmt', 'ChairmanMessageController');
    Route::get('chairmenmessage-mgmt/remove/{id}', 'ChairmanMessageController@remove')->name('chairmenmessage-mgmt.remove');

    //Principle Message
    Route::resource('principlemessage-mgmt', 'PrincipleMessageController');
    Route::get('principlemessage-mgmt/remove/{id}', 'PrincipleMessageController@remove')->name('principlemessage-mgmt.remove');

    //We Offer
    Route::resource('weoffer-mgmt', 'WeOfferController');
    Route::get('weoffer-mgmt/remove/{id}', 'WeOfferController@remove')->name('weoffer-mgmt.remove');

    //School History
    Route::resource('schoolhistory-mgmt', 'SchoolHistoryController');
    Route::get('schoolhistory-mgmt/remove/{id}', 'SchoolHistoryController@remove')->name('schoolhistory-mgmt.remove');

    //Vission Mission Aim
    Route::resource('vissionmissionaim-mgmt', 'VisionMissionAimController');
    Route::get('vissionmissionaim-mgmt/remove/{id}', 'VisionMissionAimController@remove')->name('vissionmissionaim-mgmt.remove');

    //Managing Commmittee
    Route::resource('managingcommittee-mgmt', 'ManagingCommitteeController');
    Route::get('managingcommittee-mgmt/remove/{id}', 'ManagingCommitteeController@remove')->name('managingcommittee-mgmt.remove');

    //Contact Information
    Route::resource('contactinfo-mgmt', 'ContactInformationController');
    Route::get('contactinfo-mgmt/remove/{id}', 'ContactInformationController@remove')->name('contactinfo-mgmt.remove');

    //Home Banner Image
    Route::resource('homebannerimage-mgmt','HomeBannerImageController');
    Route::get('homebannerimage-mgmt/remove/{id}', 'HomeBannerImageController@remove')->name('homebannerimage-mgmt.remove');

    //Usefull Link
    Route::resource('usefulllinks-mgmt','UsefulLinksController');
    Route::get('usefulllinks-mgmt/remove/{id}', 'UsefulLinksController@remove')->name('usefulllinks-mgmt.remove');

    //Home Page Info
    Route::resource('homepageinfo-mgmt','HomePageInfoController');
    Route::get('homepageinfo-mgmt/remove/{id}', 'HomePageInfoController@remove')->name('homepageinfo-mgmt.remove');

    //Academic Menu Population
    Route::resource('acadesmiccategory-mgmt', 'AcademicNoticeListController');
    Route::get('acadesmiccategory-mgmt/remove/{id}', 'AcademicNoticeListController@remove')->name('acadesmiccategory-mgmt.remove');

    //Academic Notice
    Route::resource('academicnotice-mgmt','AcademicNoticeController');
    Route::get('academicnotice-mgmt/remove/{id}', 'AcademicNoticeController@remove')->name('academicnotice-mgmt.remove');
    Route::post('academicnotice-mgmt/storeCategory', 'AcademicNoticeController@storeCategory')->name('academicnotice-mgmt.storeCategory');

    //Image Gallery Category
    Route::resource('gallerycategories-mgmt', 'GalleryCategoryController');
    Route::get('gallerycategories-mgmt/remove/{id}', 'GalleryCategoryController@remove')->name('gallerycategories-mgmt.remove');
    Route::get('gallerycategories-mgmt/showData/{id}', 'GalleryCategoryController@showData')->name('gallerycategories-mgmt.showData');

    //Image Gallery
    Route::resource('imggallery-mgmt','ImageGalleryController');
    Route::get('imggallery-mgmt/remove/{id}', 'ImageGalleryController@remove')->name('imggallery-mgmt.remove');
    Route::post('imggallery-mgmt/storeCategory', 'ImageGalleryController@storeCategory')->name('imggallery-mgmt.storeCategory');


    //About Us category
    Route::resource('aboutus-mgmt', 'AboutusCategoryController');
    Route::get('aboutus-mgmt/remove/{id}', 'AboutusCategoryController@remove')->name('aboutus-mgmt.remove');
    Route::get('aboutus-mgmt/showData/{id}', 'AboutusCategoryController@showData')->name('aboutus-mgmt.showData');

    //About Us
    Route::resource('aboutus-mgmt','AboutController');
    Route::get('aboutus-mgmt/remove/{id}', 'AboutController@remove')->name('aboutus-mgmt.remove');
    Route::post('aboutus-mgmt/storeCategory', 'AboutController@storeCategory')->name('aboutus-mgmt.storeCategory');


    //Our Service Category
    Route::resource('ourservice-mgmt', 'OurserviceCategoryController');
    Route::get('ourservice-mgmt/remove/{id}', 'OurserviceCategoryController@remove')->name('ourservice-mgmt.remove');
    Route::get('ourservice-mgmt/showData/{id}', 'OurserviceCategoryController@showData')->name('ourservice-mgmt.showData');

    //Our Service Program
    Route::resource('ourservice-mgmt','OurserviceController');
    Route::get('ourservice-mgmt/remove/{id}', 'OurserviceController@remove')->name('ourservice-mgmt.remove');
    Route::post('ourservice-mgmt/storeCategory', 'OurserviceController@storeCategory')->name('ourservice-mgmt.storeCategory');


    //Education Category
    Route::resource('educationprogramcategories-mgmt', 'EducationprogramCategoryController');
    Route::get('educationprogramcategories-mgmt/remove/{id}', 'EducationprogramCategoryController@remove')->name('educationprogramcategories-mgmt.remove');
    Route::get('educationprogramcategories-mgmt/showData/{id}', 'EducationprogramCategoryController@showData')->name('educationprogramcategories-mgmt.showData');

    //Education Program
    Route::resource('educationprogram-mgmt','EducationprogramController');
    Route::get('educationprogram-mgmt/remove/{id}', 'EducationprogramController@remove')->name('educationprogram-mgmt.remove');
    Route::post('educationprogram-mgmt/storeCategory', 'EducationprogramController@storeCategory')->name('educationprogram-mgmt.storeCategory');


    //Facility Category
    Route::resource('facilitycategories-mgmt', 'FacilityCategoryController');
    Route::get('facilitycategories-mgmt/remove/{id}', 'FacilityCategoryController@remove')->name('facilitycategories-mgmt.remove');
    Route::get('facilitycategories-mgmt/showData/{id}', 'FacilityCategoryController@showData')->name('facilitycategories-mgmt.showData');

    //Facility
    Route::resource('facility-mgmt','FacilityController');
    Route::get('facility-mgmt/remove/{id}', 'FacilityController@remove')->name('facility-mgmt.remove');
    Route::post('facility-mgmt/storeCategory', 'FacilityController@storeCategory')->name('facility-mgmt.storeCategory');


    //Admission
    Route::resource('admissioncategory-mgmt','AdmissionCategoryController');
    Route::get('admissioncategory-mgmt/remove/{id}', 'AdmissionCategoryController@remove')->name('admissioncategory-mgmt.remove');
    Route::post('admissioncategory-mgmt/storeCategory', 'AdmissionCategoryController@storeCategory')->name('admissioncategory-mgmt.storeCategory');

    //Admission Notice
    Route::resource('admissionnotice-mgmt','AdmissionNoticeController');
    Route::get('admissionnotice-mgmt/remove/{id}', 'AdmissionNoticeController@remove')->name('admissionnotice-mgmt.remove');
    Route::post('admissionnotice-mgmt/storeCategory', 'AdmissionNoticeController@storeCategory')->name('admissionnotice-mgmt.storeCategory');

    //Latest Info
    Route::resource('latestinfo-mgmt', 'LatestinfoController');
    Route::get('latestinfo-mgmt/remove/{id}', 'LatestinfoController@remove')->name('latestinfo-mgmt.remove');

    //Student Info
    Route::resource('studentinfo-mgmt', 'StudentinfoController');
    Route::get('studentinfo-mgmt/remove/{id}', 'StudentinfoController@remove')->name('studentinfo-mgmt.remove');

    //Parents Feedback
    Route::resource('parentsfeedback-mgmt', 'ParentsfeedbackController');
    Route::get('parentsfeedback-mgmt/remove/{id}', 'ParentsfeedbackController@remove')->name('parentsfeedback-mgmt.remove');
    Route::post('parentsfeedback-mgmt/send-email', 'ParentsfeedbackController@sendEmail')->name('parentsfeedback-mgmt.send.email');
});
