<?php

namespace App\Providers;

use App\Http\IRepositories\IAnswerRepository;
use App\Http\IRepositories\IBlogRepository;
use App\Http\IRepositories\ICertificateRepository;
use App\Http\IRepositories\ICommentRepository;
use App\Http\IRepositories\IContactRepository;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\ICourseStudentRepository;
use App\Http\IRepositories\ILibraryRepository;
use App\Http\IRepositories\IStudentCourseRegistrationRequestRepository;
use App\Http\IRepositories\IDiplomaRepository;
use App\Http\IRepositories\IFileRepository;
use App\Http\IRepositories\IHomeworkRepository;
use App\Http\IRepositories\ILectureRepository;
use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IOptionRepository;
use App\Http\IRepositories\IProfileRepository;
use App\Http\IRepositories\IProgressRepository;
use App\Http\IRepositories\IQuestionRepository;
use App\Http\IRepositories\IQuestionTypeRepository;
use App\Http\IRepositories\IRoleRepository;
use App\Http\IRepositories\IScheduleRepository;
use App\Http\IRepositories\ISettingImageRepository;
use App\Http\IRepositories\ISettingRepository;
use App\Http\IRepositories\IStudentFileRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\ISurveyAnswerRepository;
use App\Http\IRepositories\ISurveyOptionRepository;
use App\Http\IRepositories\ISurveyQuestionRepository;
use App\Http\IRepositories\ISurveyRepository;
use App\Http\IRepositories\ITeacherRepository;
use App\Http\IRepositories\ITestRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Repository\AnswerRepository;
use App\Http\Repository\BlogRepository;
use App\Http\Repository\CertificateRepository;
use App\Http\Repository\CommentRepository;
use App\Http\Repository\ContactRepository;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\CourseStudentRepository;
use App\Http\Repository\DiplomaRepository;
use App\Http\Repository\FileRepository;
use App\Http\Repository\HomeworkRepository;
use App\Http\Repository\LectureRepository;
use App\Http\Repository\LibraryRepository;
use App\Http\Repository\LoginRepository;
use App\Http\Repository\NotificationRepository;
use App\Http\Repository\OptionRepository;
use App\Http\Repository\ProfileRepository;
use App\Http\Repository\ProgressRepository;
use App\Http\Repository\QuestionRepository;
use App\Http\Repository\QuestionTypeRepository;
use App\Http\Repository\RoleRepository;
use App\Http\Repository\ScheduleRepository;
use App\Http\Repository\SettingImageRepository;
use App\Http\Repository\SettingRepository;
use App\Http\Repository\StudentFileRepository;
use App\Http\Repository\StudentRepository;
use App\Http\Repository\SurveyAnswerRepository;
use App\Http\Repository\SurveyOptionRepository;
use App\Http\Repository\SurveyQuestionRepository;
use App\Http\Repository\SurveyRepository;
use App\Http\Repository\TeacherRepository;
use App\Http\Repository\TestRepository;
use App\Http\Repository\UserRepository;
use App\Http\Repository\StudentCourseRegistrationRequestRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(ILoginRepository::class, LoginRepository::class);



    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
