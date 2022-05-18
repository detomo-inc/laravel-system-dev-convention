# Software Structure
## Tiêu chuẩn và mục tiêu chuẩn hóa System Structure
+ Tạo điều kiện dễ dàng hơn để team có nhiều member cùng làm việc trên 1 dự án:
  + Các member đều hiểu logic nào nên được viết ở đâu
  + Các logic giống nhau được đặt ở trong cùng 1 class/package, tạo điều kiện dễ dàng cho việc common hóa logic giống nhau, tránh tạo ra nhiều logic gần giống nhau trong dự án
  + Đơn giản hóa việc review đảm bảo chất lượng, vì người review biết cần review nội dung gì ở đâu
+ Tạo điều kiện dễ dàng hơn trong việc maintenance hệ thống về sau
  +Khi thêm bớt chức năng thì kiến trúc của hệ thống không bị phá vỡ, không gây degrade
+ Tạo điều kiện dễ dàng hơn trong việc nâng cấp or chuyển đổi Framework
  + Phân chia rõ ràng những logic phụ thuộc vào Framework và logic độc lập với Framework (business logic), nhờ đó khi nâng cấp or chuyển đổi Framework thì vẫn dùng lại được phần logic business
+ Giúp team tập trung hơn vào việc code phần liên quan đến business logic bằng cách chuẩn hóa phần logic không liên quan đến Business Logic (chính là phần phụ thuộc vào Framework)

## Phương châm chuẩn hóa System Structure
Để thực hiện các tiêu chuẩn và mục tiêu chuẩn hóa System Structure ở trên, sẽ thực hiện chuẩn hóa System Structure theo phương châm sau:
+ Phân chia rõ vai trò nhiệm vụ của từng Layer
+ Chuẩn hóa logic phải viết trong những phần phụ thuộc vào FrameWork theo hướng giảm thiểu
  + Phần phụ thuộc vào Framework: Route, Controller, Repository, Model
  + Logic ngắn gọn nhất có thể
  + Tận dụng tool tự gen source code cho phần này nếu có thể
  + Tận dụng library của Framework cho những xử lý không liên quan đến Business Logic
  + Chuẩn hóa coding rule để có thể tham khảo copy từ đã có khi cần thêm chức năng mới
+ Business Logic tập trung trong Service layer, tạo điều kiện dễ dàng dùng lại khi nâng cấp Framework hoặc khi chuyển sang Framework khác cùng ngôn ngữ. 
+ Tạo điều kiện dễ dàng cho maintenance về sau cũng như common hóa trong quá trình code

## Software Structure Diagram
Với phương châm và mục tiêu nêu ra trong 2 phần trên, sẽ chia layer theo model MVC của Laravel trong đó phần Model chia nhỏ hơn thành các layer Service, Repository và Model như mô tả trong hình bên dưới:
