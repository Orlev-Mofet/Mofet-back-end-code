<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('languages')->insert([
            [
                'key' => 'welcome_to_mofet',
                'en' => 'welcome_to_mofet ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 
                'ar' => 'من المهم الاعتناء بالمريض، وأن يتبعه المريض، لكن ذلك سيحدث في وقت يكون فيه الكثير من العمل والألم.', 
                'he' => 'חשוב לדאוג למטופל, להיות בעקבות המטופל, אבל זה יקרה בזמן כזה שיש הרבה עבודה וכאב.'
            ], 
            [
                'key' => 'all_questions',
                'en' => 'all_questions ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 
                'ar' => 'من المهم الاعتناء بالمريض، وأن يتبعه المريض، لكن ذلك سيحدث في وقت يكون فيه الكثير من العمل والألم.', 
                'he' => 'חשוב לדאוג למטופל, להיות בעקבות המטופל, אבל זה יקרה בזמן כזה שיש הרבה עבודה וכאב.'
            ], 
            [
                'key' => 'otp_verification',
                'en' => 'otp_verification ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 
                'ar' => 'من المهم الاعتناء بالمريض، وأن يتبعه المريض، لكن ذلك سيحدث في وقت يكون فيه الكثير من العمل والألم.', 
                'he' => 'חשוב לדאוג למטופל, להיות בעקבות המטופל, אבל זה יקרה בזמן כזה שיש הרבה עבודה וכאב.'
            ], 
            [
                'key' => 'terms_and_policy',
                'en' => 'terms_and_policy ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 
                'ar' => 'من المهم الاعتناء بالمريض، وأن يتبعه المريض، لكن ذلك سيحدث في وقت يكون فيه الكثير من العمل والألم.', 
                'he' => 'חשוב לדאוג למטופל, להיות בעקבות המטופל, אבל זה יקרה בזמן כזה שיש הרבה עבודה וכאב.'
            ], 
            [
                'key' => 'confirming_abuse_content',
                'en' => 'cofirming abuse ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 
                'ar' => 'من المهم الاعتناء بالمريض، وأن يتبعه المريض، لكن ذلك سيحدث في وقت يكون فيه الكثير من العمل والألم.', 
                'he' => 'חשוב לדאוג למטופל, להיות בעקבות המטופל, אבל זה יקרה בזמן כזה שיש הרבה עבודה וכאב.'
            ], 
            [
                'key' => 'must_input_personal_setting',
                'en' => "You must input 'First Name' and 'Field Of Interest.'", 
                'ar' => 'يجب عليك إدخال "الاسم الأول" و"مجال الاهتمام".', 
                'he' => "עליך להזין 'שם פרטי' ו'תחום עניין'."
            ], 
            [
                'key' => 'cannot_vote_on_your_question_and_answer',
                'en' => "You can't vote on your question and answer.", 
                'ar' => "لا يمكنك التصويت على سؤالك وإجابتك.", 
                'he' => "אתה לא יכול להצביע על השאלה והתשובה שלך."
            ], 
            [
                'key' => 'complete_personal_setting',
                'en' => 'Please complete your Personal Setting.', 
                'ar' => 'يرجى إكمال إعداداتك الشخصية.', 
                'he' => 'אנא השלם את ההגדרה האישית שלך.'
            ], 
            [
                'key' => 'input_content',
                'en' => 'Please input content.', 
                'ar' => 'الرجاء إدخال المحتوى.', 
                'he' => 'נא להזין תוכן.'
            ], 
            [
                'key' => 'contact_us_success',
                'en' => 'Message has been sent successfully.', 
                'ar' => 'تم إرسال الرسالة بنجاح.', 
                'he' => 'ההודעה נשלחה בהצלחה.'
            ], 



            [
                'key' => 'input_answer',
                'en' => 'Please input your answer.', 
                'ar' => 'الرجاء إدخال إجابتك.', 
                'he' => 'אנא הזן את תשובתך.'
            ], 
            [
                'key' => 'report_abuse_success',
                'en' => 'Report abuse successfully.', 
                'ar' => 'الإبلاغ عن إساءة الاستخدام بنجاح.', 
                'he' => 'דווח על שימוש לרעה בהצלחה.'
            ], 
            [
                'key' => 'answer_saved_success',
                'en' => 'Answer saved successfully.', 
                'ar' => 'تم حفظ الإجابة بنجاح.', 
                'he' => 'התשובה נשמרה בהצלחה.'
            ], 
            [
                'key' => 'personal_setting_saved_success',
                'en' => 'Personal setting saved successfully.', 
                'ar' => 'تم حفظ الإعداد الشخصي بنجاح.', 
                'he' => 'ההגדרה האישית נשמרה בהצלחה.'
            ], 
            [
                'key' => 'input_question',
                'en' => 'Please input your question.', 
                'ar' => 'الرجاء إدخال سؤالك.', 
                'he' => 'אנא הזן את שאלתך.'
            ], 
            [
                'key' => 'question_saved_success',
                'en' => 'Question saved successfully.', 
                'ar' => 'تم حفظ السؤال بنجاح.', 
                'he' => 'השאלה נשמרה בהצלחה.'
            ],
            [
                'key' => 'upload_file_size_limit',
                'en' => 'Upload files should be less than {file_size}.', 
                'ar' => 'يجب أن يكون تحميل الملفات أقل من {file_size}.', 
                'he' => 'העלאת קבצים צריכה להיות קטנה מ-{file_size}.'
            ],
            [
                'key' => 'phone_number_is_invalid',
                'en' => 'Phone number is invalid.', 
                'ar' => 'رقم الهاتف غير صالح.', 
                'he' => 'מספר הטלפון אינו חוקי.'
            ],
            [
                'key' => 'cant_send_otp_to_your_phone',
                'en' => "Cannot send OTP to your phone number.", 
                'ar' => "لا يمكن إرسال OTP إلى رقم هاتفك.", 
                'he' => "לא ניתן לשלוח OTP למספר הטלפון שלך."
            ],
            [
                'key' => 'please_input_correct_otp',
                'en' => "Please input the correct OTP code.", 
                'ar' => "الرجاء إدخال رمز OTP الصحيح.", 
                'he' => "אנא הזן את קוד ה-OTP הנכון."
            ],
            [
                'key' => 'new_physics_question_posted',
                'en' => "New Physics  Question posted.", 
                'ar' => "تم نشر سؤال فيزياء جديد.", 
                'he' => "פורסם שאלה חדשה בפיזיקה."
            ],
            [
                'key' => 'new_mathematics_question_posted',
                'en' => "New Mathematics Question posted.", 
                'ar' => "تم نشر سؤال جديد في الرياضيات.", 
                'he' => "פורסם שאלה חדשה במתמטיקה."
            ],
            [
                'key' => 'answer_added_on_your_question',
                'en' => "New Answer added on your question.", 
                'ar' => "تمت إضافة إجابة جديدة على سؤالك.", 
                'he' => "נוספה תשובה חדשה לשאלתך."
            ],
            [
                'key' => 'answer_posted_on_math_question',
                'en' => "New answer was posted to a math question.", 
                'ar' => "تم نشر إجابة جديدة لسؤال الرياضيات.", 
                'he' => "תשובה חדשה פורסמה לשאלה במתמטיקה."
            ],
            [
                'key' => 'answer_posted_on_physics_question',
                'en' => "New answer was posted to a physics question.", 
                'ar' => "تم نشر إجابة جديدة لسؤال الفيزياء.", 
                'he' => "תשובה חדשה פורסמה לשאלה בפיזיקה."
            ],
            [
                'key' => 'your_question_abused',
                'en' => "Your question abused.", 
                'ar' => "سؤالك مسيئ.", 
                'he' => "שאלתך נוצלה לרעה."
            ],
            [
                'key' => 'your_answer_abused',
                'en' => "Your answer abused.", 
                'ar' => "إجابتك مسيئة.", 
                'he' => "תשובתך ניצלה לרעה."
            ],



            [
                'key' => 'first_name',
                'en' => "First name", 
                'ar' => "الاسم الأول", 
                'he' => "שם פרטי"
            ],
            [
                'key' => 'surname',
                'en' => "Surname", 
                'ar' => "اسم العائلة", 
                'he' => "שם פרטי"
            ],
            [
                'key' => 'year_of_birth',
                'en' => "Year of birth", 
                'ar' => "سنة الميلاد", 
                'he' => "שנת לידה"
            ],
            [
                'key' => 'school_name',
                'en' => "School name", 
                'ar' => "اسم المدرسة", 
                'he' => "שם בית הספר"
            ],
            [
                'key' => 'city',
                'en' => "City", 
                'ar' => "مدينة", 
                'he' => "עִיר"
            ],
            [
                'key' => 'male',
                'en' => "MALE", 
                'ar' => "ذكر", 
                'he' => "זָכָר"
            ],
            [
                'key' => 'female',
                'en' => "FEMALE", 
                'ar' => "ذكر", 
                'he' => "נְקֵבָה"
            ],
            [
                'key' => 'others',
                'en' => "OTHERS", 
                'ar' => "آحرون", 
                'he' => "אחרים"
            ],
            [
                'key' => 'email',
                'en' => "EMAIL", 
                'ar' => "بريد الالكتروني", 
                'he' => "אימייל"
            ],
            [
                'key' => 'your_grade',
                'en' => "Your grade", 
                'ar' => "درجتك", 
                'he' => "הציון שלך"
            ],
            [
                'key' => 'field_of_interest',
                'en' => "Field of interest", 
                'ar' => "مجال الاهتمام", 
                'he' => "תחום עניין"
            ],
            [
                'key' => 'approved_notification',
                'en' => "Approved Notification", 
                'ar' => "الإخطار المعتمد", 
                'he' => "הודעה מאושרת"
            ],


            [
                'key' => 'mathematics',
                'en' => "Mathematics", 
                'ar' => "الرياضيات", 
                'he' => "מָתֵימָטִיקָה"
            ],
            [
                'key' => 'physics',
                'en' => "Physics", 
                'ar' => "الفيزياء", 
                'he' => "פיזיקה"
            ],
            [
                'key' => 'maths_physics',
                'en' => "Maths & Physics", 
                'ar' => "الرياضيات والفيزياء", 
                'he' => "מתמטיקה ופיזיקה"
            ],
            [
                'key' => 'my_own_questions',
                'en' => "My Own Questions", 
                'ar' => "أسئلتي الخاصة", 
                'he' => "שאלות משלי"
            ],
            [
                'key' => 'all_questions',
                'en' => "All Questions", 
                'ar' => "جميع الأسئلة", 
                'he' => "כל השאלות"
            ],
            [
                'key' => 'contact_us',
                'en' => "Contact Us", 
                'ar' => "اتصل بنا", 
                'he' => "צור קשר"
            ],



            [
                'key' => 'select_the_wall',
                'en' => "Select the wall", 
                'ar' => "حدد الجدار", 
                'he' => "בחר את הקיר"
            ],
            [
                'key' => 'questions_answers',
                'en' => "QUESTIONS & ANSWERS", 
                'ar' => "الأسئلة والأجوبة", 
                'he' => "שאלות ותשובות"
            ],
            [
                'key' => 'please_type_here',
                'en' => "Please Type Here", 
                'ar' => "الرجاء الكتابة هنا", 
                'he' => "אנא הקלד כאן"
            ],
            [
                'key' => 'ask_question?',
                'en' => "Ask Question?", 
                'ar' => "اسأل سؤالا؟", 
                'he' => "שאל שאלה?"
            ],
            [
                'key' => 'report_abuse',
                'en' => "Report Abuse", 
                'ar' => "بلغ عن سوء معاملة", 
                'he' => "דווח על שימוש לרעה"
            ],
            [
                'key' => 'ask_question',
                'en' => "Ask Question", 
                'ar' => "اسأل سؤالا", 
                'he' => "שאל שאלה"
            ],
            [
                'key' => 'confirming_abuse',
                'en' => "Confirming Abuse", 
                'ar' => "تأكيد الإساءة", 
                'he' => "אישור שימוש לרעה"
            ],

            [
                'key' => 'prefix_q',
                'en' => "Q", 
                'ar' => "س", 
                'he' => "ש"
            ],
            [
                'key' => 'otp_resend',
                'en' => "resend", 
                'ar' => "إعادة إرسال", 
                'he' => "לשלוח שוב"
            ],

        ]);


        DB::table('constants')->insert([
            [
                'key' => 'contact_mail', 
                'value' => 'mofet@gmail.com'
            ], 
            [
                'key' => 'max_upload_size', 
                'value' => '10'
            ]
        ]);
    }
}
