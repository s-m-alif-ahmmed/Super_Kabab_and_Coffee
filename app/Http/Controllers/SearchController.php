<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        return view('website.search.search');
    }

    public function searchResult(Request $request)
    {
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $searchItems = Item::where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
                ->where('status', 1)
                ->latest()
                ->paginate(24); // Change 10 to the number of items you want to display per page.

            if ($searchItems->isEmpty()) {
                // No matching results found.
                return redirect()->back()->with('message', 'No matching result found.');
            } else {
                // Display the search results.
                return view('website.search.search-result', compact('searchItems'));
            }
        } else {
            // If no search query is provided, redirect back with a message.
            return redirect()->back()->with('message', 'Please enter a search query.');
        }
    }

    public function searchItems(Request $request)
    {
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $searchItems = Item::where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
                ->where('status', 1)
                ->latest()
                ->paginate(24); // Change 10 to the number of items you want to display per page.

            if ($searchItems->isEmpty()) {
                // No matching results found.
                return redirect()->back()->with('message', 'No matching result found.');
            } else {
                // Display the search results.
                return view('website.search.search-items', compact('searchItems'));
            }
        }
        else
        {
            return 'yo';
        }
    }

}
