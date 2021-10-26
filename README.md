Link demo : http://nhatrolongmung.epizy.com/
Ứng dụng: một web site kết nối những chủ nhà trọ với những người muốn tìm nhà trọ với nhau và tình trạng phòng, giá tiền, vv
# Xuất phát ý tưởng :
    - Nhìn thấy mỗi lần sinh viên năm học mới, hay muốn đổi phòng trọ phải tìm kiếm trên nhiều fanpage trên facebook rất tốn thời gian và mệt mỏi. Nên đã nảy ra ý tưởng tạo một mạng lưới chủ nhà trọ (nhỏ và siêu nhỏ) với người muốn thuê (định hướng: sinh viên, công nhân thu nhập thấp).
# Đối tượng cung cấp dịch vụ: chủ nhà trọ (nhỏ và siêu nhỏ), sinh viên, công nhân thu nhập thấp.
# Các chức năng:
  +) Phân chia khả năng dựa vào tài khoản đăng nhập
  +) Nếu không đăng nhập: Chỉ có thể xem thông tin các phòng còn trống,địa chỉ (có hệ thống google map), giá tiền, thông tin chủ nhà trọ để liên hệ thuê phòng.
  +) Phía bên sinh viên, công nhân (nếu đăng nhập):
    1. Có thể đăng bài viết tìm người ở ghép.
    2. Thậm chí đăng thông tin nhu cầu muốn thuê để chủ các nhà trọ liên hệ (đang cân nhắc tính khả thi của chức năng này)
    3. Được nhận thông báo mỗi khi có người đăng phòng trọ, tìm người ở ghép đáp ứng nhu cầu bản thân đã lưu ở hệ thống (ví dụ: giá tiền, vị trí, vv).
  +) Phía bên chủ nhà trọ (nếu đăng nhập):
    1. Có thể đăng số lượng, thông tin các phòng trọ trống.
    2. Có thể được đánh giá độ tín nhiệm (bằng: khảo sát thực tế, khuôn viên phòng và xung quanh, độ trung thực và rõ ràng trong thanh toán tiền phòng mỗi tháng, đánh giá của người đã ở trọ (chiếm ít))
    3. Nếu độ tín nhiệm cao sẽ ưu tiên xếp đầu trong bảng thông báo.
    4. Có chức năng kiểm soát số phòng trọ đang đầy, số tiền trọ mỗi tháng mỗi tháng phải thu (tạo bảng như excel), ai đã đóng tiền, ai chưa và gửi tin nhắn (hoặc cả thông báo) tới nhắc nhở.
# Kiến trúc trao đổi thông tin: lựa chọn mô hình Client-Server (demo sử dụng mysql)
  +) Cơ sở dữ liệu:
    1. Cơ sở dữ liệu đăng nhập: Tài khoản, mật khẩu (đã được hash BCRYPT)
    2. Kho cơ sở dữ liệu cá nhân: thông tin cá nhân bản thân, hình ảnh các phòng, giá tiền các phòng, giới thiệu, địa điểm vv (cho chủ nhà trọ).
    3. Kho cơ sở dũ liệu cá nhân: về nhu cầu về giá phòng, vị trí , khoảng cách, tìm người ở ghép vv (cho sinh viên, công nhân).
  +) Ý nghĩa và vai trò của mạng internet: Nếu không có internet thi gần như không khả thi để xây dựng ứng dụng này, vì đây là ứng dụng cần sự tương tác nhiều giữ nhiều cá nhân khác nhau. Mạng internet giúp cho việc sử dụng, giao tiếp dễ dàng không phụ thuộc khoảng cách, các loại thiết bị. Còn giúp ứng dụng có thể cập nhật, tích hợp thêm chức năng dễ dàng
# Đánh giá khả năng ứng dụng và thị trường:
  +) Vì sản phẩm chưa được thử nghiệm thực sự nên khá khó để đánh giá khả năng ứng dụng một cách chính xác và khách quan. Tuy nhiên, nhất định là đủ để áp ứng đúng và đủ nhu cầu tìm, thuê phòng trọ của các bạn sinh viên, các công nhân. Chắc chắn các chức năng hơn fanpage nhà trọ ở facebook, nhưng vấn đề là khả năng tiếp cận, và độ phủ mới là yếu tố quan trọng lại không bằng facebook. (Giải pháp có 1 fanpage bên facebook).
  +) Thị trường: thị phần thị trường còn rộng nhất ở khu vực thành thị (Hà Nội, Hồ Chí Minh), và nhu cầu tăng rất cao vào đầu năm học. Tuy nhiên cạnh tranh tương đối cao vì không phải là chưa có sản phẩm tương tự trên thị trường.
                                                                        
                                                                                    Nguyễn Văn Kỳ
