<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background: #f4f6fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0;">
    <div style="max-width: 700px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px;">
        @auth
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <p style="margin: 0; font-size: 1.1em; color: #333;">Welcome, you are logged in</p>
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button style="background: #e74c3c; color: #fff; border: none; padding: 8px 18px; border-radius: 6px; cursor: pointer;">Logout</button>
            </form>
        </div>

        <div style="border: 1.5px solid #e1e4e8; border-radius: 8px; padding: 24px; margin-bottom: 32px; background: #f9fafb;">
            <h2 style="margin-top: 0; color: #2d3748;">Create a new Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" required
                    style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #d1d5db; border-radius: 5px;">
                <textarea name="body" placeholder="Body content" cols="30" rows="5"
                    style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #d1d5db; border-radius: 5px;"></textarea>
                <button style="background: #2563eb; color: #fff; border: none; padding: 10px 22px; border-radius: 6px; cursor: pointer;">Create Post</button>
            </form>
        </div>

        <div style="border: 1.5px solid #e1e4e8; border-radius: 8px; background: #f9fafb; padding: 24px;">
            <h2 style="margin-top: 0; color: #2d3748;">All Posts</h2>
            @foreach ($posts as $post)
            <div style="background-color: #f1f5f9; border-radius: 6px; padding: 16px; margin-bottom: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <h3 style="margin: 0 0 8px 0; color: #1e293b;">{{ $post['title']}}</h3>
                <p style="margin: 0 0 12px 0; color: #374151;">{{ $post['body']}}</p>
                <div style="display: flex; gap: 12px;">
                    <a href="/edit-post/{{ $post['id'] }}" style="color: #2563eb; text-decoration: none; font-weight: 500;">Edit</a>
                    <form action="/delete-post/{{ $post['id'] }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button style="background: #e11d48; color: #fff; border: none; padding: 6px 14px; border-radius: 5px; cursor: pointer;">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="display: flex; gap: 40px; justify-content: center; flex-wrap: wrap; margin-top: 40px;">
            <div style="background: #f9fafb; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); padding: 32px 28px; min-width: 300px;">
                <h1 style="margin-top: 0; color: #2563eb;">Register</h1>
                <form method="POST" action="/register" style="display: flex; flex-direction: column; gap: 16px;">
                    @csrf
                    <div>
                        <label for="name" style="font-weight: 500;">Name:</label><br>
                        <input type="text" id="name" name="name" required
                            style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 5px;">
                    </div>
                    <div>
                        <label for="email" style="font-weight: 500;">Email:</label><br>
                        <input type="email" id="email" name="email" required
                            style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 5px;">
                    </div>
                    <div>
                        <label for="password" style="font-weight: 500;">Password:</label><br>
                        <input type="password" id="password" name="password" required
                            style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 5px;">
                    </div>
                    <button type="submit" style="background: #2563eb; color: #fff; border: none; padding: 10px 0; border-radius: 6px; font-size: 1em; cursor: pointer;">Register</button>
                </form>
            </div>
            <div style="background: #f9fafb; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); padding: 32px 28px; min-width: 300px;">
                <h1 style="margin-top: 0; color: #2563eb;">Login</h1>
                <form method="POST" action="/login" style="display: flex; flex-direction: column; gap: 16px;">
                    @csrf
                    <div>
                        <label for="loginname" style="font-weight: 500;">Name:</label><br>
                        <input type="text" id="loginname" name="loginname" required
                            style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 5px;">
                    </div>
                    <div>
                        <label for="loginpassword" style="font-weight: 500;">Password:</label><br>
                        <input type="password" id="loginpassword" name="loginpassword" required
                            style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 5px;">
                    </div>
                    <button type="submit" style="background: #2563eb; color: #fff; border: none; padding: 10px 0; border-radius: 6px; font-size: 1em; cursor: pointer;">Login</button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</body>
</html>