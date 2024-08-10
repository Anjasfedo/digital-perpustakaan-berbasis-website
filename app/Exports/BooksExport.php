<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BooksExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::with('category', 'user')
            ->select('title', 'category_id', 'description', 'quantity', 'user_id')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Title',
            'Category',
            'Description',
            'Quantity',
            'User',
        ];
    }

    public function map($book): array
    {
        return [
            $book->title,
            $book->category->name,
            $book->description,
            $book->quantity,
            $book->user->name,
        ];
    }
}
