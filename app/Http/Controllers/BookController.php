<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Book\BookService;
use App\Services\User\UserService;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    private $bookService;
    private $userService;

    public function __construct(BookService $bookService, UserService $userService)
    {
        $this->bookService = $bookService;
        $this->userService = $userService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return view('index', compact('books'));
    }

    public function addBook()
    {
        $users = $this->userService->getAllUsers();

        return view('add-book', compact('users'));
    }

    public function storeBook(StoreBookRequest $storeBookRequest)
    {
        $payload = $storeBookRequest->validated();
        $this->bookService->storeBook($payload);
        return redirect('/');
    }

    public function editBook($bookID)
    {
        $book = $this->bookService->findBook($bookID);
        $users = $this->userService->getAllUsers();
        return view('edit-book', compact('book', 'users'));
    }

    public function updateBook(StoreBookRequest $storeBookRequest, $bookID)
    {
        $payload = $storeBookRequest->validated();
        $this->bookService->updateBook($payload, $bookID);
        return redirect('/');
    }

    public function deleteBook($bookID)
    {
        $this->bookService->deleteBook($bookID);
        return redirect('/');
    }
}
