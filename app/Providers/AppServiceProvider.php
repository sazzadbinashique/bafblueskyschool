<?php

namespace App\Providers;

use App\AcademicNoticeList;
use App\AdmissionCategory;
use App\ContactInformation;
use App\GalleryCategory;
use App\FacilityCategory;
use App\TestCategory;
use App\HistoryCategory;
use App\Latestinfo;
use App\HomePageInfo;
use App\UsefulLinks;
use App\WeOffer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $contactInfo = ContactInformation::latest('id')->first();
        $usefulLinks = UsefulLinks::orderBy('id', 'ASC')->get();
        $homeinfoPage = HomePageInfo::latest('id')->first();
        $academicNoticelists = AcademicNoticeList::get();
        $admissionCategorys = AdmissionCategory::get();
        $galleryCategories = GalleryCategory::get();
        $facilityCategories = FacilityCategory::get();
        $latestInfos  = Latestinfo::get();
        View::share([
            'contactInfo' => $contactInfo,
            'usefulLinks' => $usefulLinks,
            'homeinfoPage' => $homeinfoPage,
            'academicNoticelists' => $academicNoticelists,
            'admissionCategorys' => $admissionCategorys,
            'galleryCategories' => $galleryCategories,
            'facilityCategories' => $facilityCategories,
            'latestInfos' => $latestInfos

        ]);
    }
}
