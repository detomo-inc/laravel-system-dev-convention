# Laravel coding convention

## Pgoramming

* Nên bao các xử lý có phát sinh ghi data trong DB vào transaction. Điều này không chỉ giúp rollback lại khi có error, mà còn tăng tốc độ khi một request gọi nhiều SQL query. Sample (TBD)
* Không thực hiện truy vấn trong Blade view
* Sử dụng eager loading
* Đừng bỏ code JS, CSS vào blade view, đừng bỏ HTML vào class PHP
* Sử dụng các files config và language, hằng số thay vì văn bản trong code

## Validation

* Không viết trực tiếp code validation trong controller. Viết 1 class extend cái Request, và đưa code validation vào trong đó, rồi pass cái request đó cho controller.
  Lí do thì tham khảo tài liệu [The Smart Way To Handle Request Validation In Laravel](https://medium.com/@kamerk22/the-smart-way-to-handle-request-validation-in-laravel-5e8886279271)

## Controller

* Models thì mập, Controllers thì gầy - Fat models, skinny controllers
  * Đặt tất cả các logic liên quan đến DB vào các Eloquent model hoặc vào các lớp Repository. Không đưa xử lý logic vào Controller.
  * Logic nghiệp vụ (Business) phải ở trong lớp dịch vụ (Service). Logic liên quan đến DB thì để trong model.
* Không viết xử lý business logic trong controller class. Controller chỉ làm 3 việc
  1. Nhận request parameter (lưu vào biến, model...)
  2. Gọi các service/helper/model class để xử lý logic.
  3. Gọi lệnh render file view (với tham số các model, biến ở bước trên). Đặc biệt tránh mô tả logic xử lý trong các private function của controller.
* Sau mỗi POST request, cần phải redirect nếu xử lý thành công (để tránh user ấn F5).

## Model

* Ưu tiên dùng Eloquent hơn Query Builder, raw SQL
* Cách sử dụng mass assignment (TBD)

## Tuân theo quy ước đặt tên của Laravel

 Follow [PSR standards](http://www.php-fig.org/psr/psr-2/).

 Also, follow naming conventions accepted by Laravel community:

What | How | Good | Bad
------------ | ------------- | ------------- | -------------
Controller | singular | ArticleController | ~~ArticlesController~~
Route | plural | articles/1 | ~~article/1~~
Named route | snake_case with dot notation | users.show_active | ~~users.show-active, show-active-users~~
Model | singular | User | ~~Users~~
hasOne or belongsTo relationship | singular | articleComment | ~~articleComments, article_comment~~
All other relationships | plural | articleComments | ~~articleComment, article_comments~~
Table | plural | article_comments | ~~article_comment, articleComments~~
Pivot table | singular model names in alphabetical order | article_user | ~~user_article, articles_users~~
Table column | snake_case without model name | meta_title | ~~MetaTitle; article_meta_title~~
Model property | snake_case | $model->created_at | ~~$model->createdAt~~
Foreign key | singular model name with _id suffix | article_id | ~~ArticleId, id_article, articles_id~~
Primary key | - | id | ~~custom_id~~
Migration | - | 2017_01_01_000000_create_articles_table | ~~2017_01_01_000000_articles~~
Method | camelCase | getAll | ~~get_all~~
Method in resource controller | [table](https://laravel.com/docs/master/controllers#resource-controllers) | store | ~~saveArticle~~
Method in test class | camelCase | testGuestCannotSeeArticle | ~~test_guest_cannot_see_article~~
Variable | camelCase | $articlesWithAuthor | ~~$articles_with_author~~
Collection | descriptive, plural | $activeUsers = User::active()->get() | ~~$active, $data~~
Object | descriptive, singular | $activeUser = User::active()->first() | ~~$users, $obj~~
Config and language files index | snake_case | articles_enabled | ~~ArticlesEnabled; articles-enabled~~
View | kebab-case | show-filtered.blade.php | ~~showFiltered.blade.php, show_filtered.blade.php~~
Config | snake_case | google_calendar.php | ~~googleCalendar.php, google-calendar.php~~
Contract (interface) | adjective or noun | AuthenticationInterface | ~~Authenticatable, IAuthentication~~
Trait | adjective | Notifiable | ~~NotificationTrait~~

## Sử dụng cú pháp ngắn hơn và dễ đọc hơn nếu có thể

Bad:

```php
$request->session()->get('cart');
$request->input('name');
```

Good:

```php
session('cart');
$request->name;
```

More examples:

Common syntax | Shorter and more readable syntax
------------ | -------------
`Session::get('cart')` | `session('cart')`
`$request->session()->get('cart')` | `session('cart')`
`Session::put('cart', $data)` | `session(['cart' => $data])`
`$request->input('name'), Request::get('name')` | `$request->name, request('name')`
`return Redirect::back()` | `return back()`
`is_null($object->relation) ? null : $object->relation->id` | `optional($object->relation)->id` (in PHP 8: `$object->relation?->id`)
`return view('index')->with('title', $title)->with('client', $client)` | `return view('index', compact('title', 'client'))`
`$request->has('value') ? $request->value : 'default';` | `$request->get('value', 'default')`
`Carbon::now(), Carbon::today()` | `now(), today()`
`App::make('Class')` | `app('Class')`
`->where('column', '=', 1)` | `->where('column', 1)`
`->orderBy('created_at', 'desc')` | `->latest()`
`->orderBy('age', 'desc')` | `->latest('age')`
`->orderBy('created_at', 'asc')` | `->oldest()`
`->select('id', 'name')->get()` | `->get(['id', 'name'])`
`->first()->name` | `->value('name')`

## Sử dụng IoC container hoặc facades thay vì new Class (TBD)

## Không lấy dữ liệu trực tiếp từ tệp .env (TBD)

## Lưu trữ ngày theo định dạng chuẩn. Sử dụng accessors and mutators để sửa đổi định dạng ngày (TBD)

## Others

* Avoid using patterns and tools that are alien to Laravel and similar frameworks (i.e. RoR, Django). If you like Symfony (or Spring) approach for building apps, it's a good idea to use these frameworks instead.
* Không bao giờ đặt bất kỳ logic nào trong các tệp routes (web.php, api.php, ...).
* Giảm thiểu việc viết code PHP trong Blade templates.
* Use in-memory DB for testing.
* Do not override standard framework features to avoid problems related to updating the framework version and many other issues.
* Use modern PHP syntax where possible, but don't forget about readability.
* Avoid using View Composers and similar tools unless you really know what you're doing. In most cases, there is a better way to solve the problem.