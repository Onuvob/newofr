<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Journal;
use App\Conference;
use App\Book;
use App\BookChapter;
use App\Research;
use App\Reward;

class StatusController extends Controller
{

    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function journalstatus()
    {
        $journals = Journal::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.journal')->with('journals', $journals);
    }

    public function showJournal($id)
    {
        //
        $journal = Journal::find($id);
        
        return view('pages.admin.publications.showpublications.journal')->with('journal', $journal);
    }

    public function conferencestatus()
    {
        $conferences = Conference::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.conference')->with('conferences', $conferences);
    }

    public function showConference($id)
    {
        //
        $conference = Conference::find($id);
        
        return view('pages.admin.publications.showpublications.conference')->with('conference', $conference);
    }

    public function bookstatus()
    {
        $books = Book::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.book')->with('books', $books);
    }

    public function showBook($id)
    {
        //
        $book = Book::find($id);
        
        return view('pages.admin.publications.showpublications.book')->with('book', $book);
    }

    public function bookchapterstatus()
    {
        $bookchapters = BookChapter::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.bookchapter')->with('bookchapters', $bookchapters);
    }

    public function showBookChapter($id)
    {
        //
        $bookchapter = BookChapter::find($id);
        
        return view('pages.admin.publications.showpublications.bookchapter')->with('bookchapter', $bookchapter);
    }

    public function researchstatus()
    {
        $researches = Research::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.research')->with('researches', $researches);
    }

    public function showResearch($id)
    {
        //
        $research = Research::find($id);
        
        return view('pages.admin.publications.showpublications.research')->with('research', $research);
    }

    public function rewardstatus()
    {
        /*$journals = Journal::where('pub_status', 'pending')
               ->orderBy('updated_at', 'desc')
               ->paginate(30);
        */
        //return view('pages.viewstatus.rewardstatus');
    }
}
