работает вите при запуске npm run build, скрипты идут из стандарной , не из модулей
x




https://realrashid.github.io/sweet-alert/usage?id=usage
как использовать в контролере sweet alert
use RealRashid\SweetAlert\Facades\Alert;
в методе перед редиректом
Alert::alert('Title', 'Message', 'Type');
Alert::success('Success Title', 'Success Message');
Alert::info('Info Title', 'Info Message');
Alert::warning('Warning Title', 'Warning Message');
Alert::error('Error Title', 'Error Message');
Alert::question('Question Title', 'Question Message');
Alert::image('Image Title!','Image Description','Image URL','Image Width','Image Height', 'Image Alt');
Alert::html('Html Title', 'Html Code', 'Type');
Alert::toast('Toast Message', 'Toast Type');

"use RealRashid\SweetAlert\Facades\Alert" был перенесен в методрв create, delete,update

в layout admin добавил блок для вывода сессий

commit languages_panel
создал заполнение на русском и иерстранном языке

commit languages_resource_lang
в файле left_lang поставил блок @if($lang === 'kkkkkkkkkkkkkkkkkkk'), чтобы скрыть плашку с языками
cоздал файлы в папке title, button, list, navbar,sidebar,modal