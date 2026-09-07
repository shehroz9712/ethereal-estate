<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\InquiryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function __construct(
        protected InquiryRepositoryInterface $inquiryRepo
    ) {}

    public function index(Request $request): View
    {
        $filters = $request->only(['type', 'status', 'search']);
        $inquiries = $this->inquiryRepo->getAll($filters, 15);

        return view('admin.inquiries.index', compact('inquiries', 'filters'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:new,contacted,resolved',
        ]);

        $this->inquiryRepo->updateStatus($inquiry, $request->status);

        return back()->with('success', "Inquiry status changed to '{$request->status}'.");
    }

    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        $this->inquiryRepo->delete($inquiry);

        return back()->with('success', 'Inquiry was removed successfully.');
    }
}
