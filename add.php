<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Employee</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            color: #333;
            /* لجعل النموذج في منتصف الشاشة تماماً */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
        }

        /* الحاوية الخارجية */
        .wrapper {
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        /* صندوق النموذج (Form Card) */
        .form_wrapper {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 450px; /* العرض الأقصى للنموذج */
        }

        /* تنسيق العناوين (Labels) */
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: #2c3e50;
        }

        /* تنسيق حقول الإدخال */
        form input[type="text"],
        form input[type="email"],
        form input[type="date"],
        form input[type="number"] {
            width: 100%;
            padding: 14px 15px;
            margin-bottom: 22px;
            border: 1px solid #dcdcdc;
            border-radius: 6px;
            font-size: 15px;
            color: #333;
            background-color: #fcfcfc;
            transition: all 0.3s ease;
        }

        /* تأثير عند النقر داخل الحقل (Focus) */
        form input:focus {
            border-color: #3498db; /* يتغير اللون للأزرق */
            background-color: #ffffff;
            outline: none;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.2); /* ظل أزرق خفيف */
        }

        /* حاوية الأزرار أسفل النموذج */
        .btn-box {
            display: flex;
            gap: 15px; /* مسافة بين الزرين */
            margin-top: 10px;
        }

        /* جعل الأزرار تأخذ مساحة متساوية */
        .btn-box button,
        .btn-box a {
            flex: 1; 
            text-decoration: none;
        }

        .btn-box button[type="submit"],
        .btn-box input[type="button"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        /* زر الحفظ (Save) */
        .btn-box button[type="submit"] {
            background-color: #2ecc71; /* لون أخضر */
        }

        .btn-box button[type="submit"]:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(46, 204, 113, 0.3);
        }

        /* زر الإلغاء (Cancel) */
        .btn-box input[type="button"] {
            background-color: #e74c3c; /* لون أحمر */
        }

        .btn-box input[type="button"]:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
        }
    </style>
</head>
<body>
    <div class="wrapper">
      <div class="form_wrapper">
        <form method="POST" action="action.php">
          <input type="text" name="fullname" placeholder="fullname">
          <input type="email" name="email" placeholder="email">
          <label for="date_of_birth">Date of Birth</label>
          <input type="date" name="date_of_birth" placeholder="date of birth">
          <label for="date_of_joining">Date of Joining</label>          
          <input type="date" name="date_of_joining" placeholder="date of joining">
          <input type="number" name="salary" placeholder="salary">
          <div class="btn-box">
            <button type="submit" name="add">Add</button>
            <a href="show.php"><input type="button" value="Cancel"></a>
          </div>
        </form>
      </div> 
    </div>
</body>
</html>