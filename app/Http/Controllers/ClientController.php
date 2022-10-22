<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Entities\Partner;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\EmailSubscriberCreateRequest;
use App\Repositories\Interfaces\CategoryRepository;
use App\Repositories\Interfaces\ContactInfoRepository;
use App\Repositories\Interfaces\ContactRepository;
use App\Repositories\Interfaces\EmailSubscriberRepository;
use App\Repositories\Interfaces\PartnerRepository;
use App\Repositories\Interfaces\PostRepository;
use App\Repositories\Interfaces\SliderRepository;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    protected $categoryRepository;
    protected $postRepository;
    protected $partnerRepository;
    protected $contactInfoRepository;
    protected $contactRepository;
    protected $emailSubscriberRepository;
    protected $sliderRepository;

    public function __construct(
        CategoryRepository        $categoryRepository,
        PostRepository            $postRepository,
        PartnerRepository         $partnerRepository,
        ContactInfoRepository     $contactInfoRepository,
        ContactRepository         $contactRepository,
        EmailSubscriberRepository $emailSubscriberRepository,
        SliderRepository          $sliderRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->partnerRepository = $partnerRepository;
        $this->contactInfoRepository = $contactInfoRepository;
        $this->contactRepository = $contactRepository;
        $this->emailSubscriberRepository = $emailSubscriberRepository;
        $this->sliderRepository = $sliderRepository;

        $contact_infos = $this->contactInfoRepository
            ->queryWithTranslate()
            ->orderBy('position')
            ->where('status', 1)
            ->limit(3)
            ->get();
        View::share('footer_contact_info', $contact_infos);
    }


    function index()
    {
        $sliders = $this->sliderRepository
            ->queryWithTranslate()
            ->where('status', 1)
            ->orderBy('position', 'asc')
            ->limit(3)
            ->get();

        $lasted_news = $this->postRepository
            ->queryWithTranslate()
            ->where('type', Category::TYPE_BLOG)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('client.index', compact('sliders', 'lasted_news'));
    }

    function contactUs()
    {
        $contact_infos = $this->contactInfoRepository
            ->queryWithTranslate()
            ->orderBy('position')
            ->where('status', 1)
            ->limit(3)
            ->get();
        return view('client.contact-us', compact('contact_infos'));
    }

    public function sendContact(ContactCreateRequest $request)
    {
        $data = $request->only($this->contactRepository->getModel()->getFillable());
        $item = $this->contactRepository->create($data);
        $response = [
            'message' => "Chúng tôi đã tiếp nhận thông tin của bạn",
            'data' => $item,
        ];

        if ($request->wantsJson()) {
            return response()->json($response);
        }

        return redirect()->back()->with('message', $response['message']);

    }

    function partners()
    {
        $partners = $this->partnerRepository->findWhere([
            'status' => '1'
        ]);
        $sponsors = $partners->where('type', Partner::TYPE_SPONSOR);
        $vendors = $partners->where('type', Partner::TYPE_VENDOR);
        $customers = $partners->where('type', Partner::TYPE_CUSTOMER);
        return view('client.partners', compact('sponsors', 'vendors', 'customers'));
    }

    function about()
    {
        return view('client.about');
    }

    /**
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    function products()
    {
        $product_categories = $this->categoryRepository
            ->queryWithTranslate()
            ->where('type', '=', Category::TYPE_PRODUCT)
            ->get();

        $products = $this->postRepository
            ->queryWithTranslate()
            ->where('type', Category::TYPE_PRODUCT);

        if (request()->has('term') && !is_null(request()->get('term'))) {
            $products->where('name', 'like', '%' . request()->get('term') . '%');
        }
        $products = $products->paginate(9);
        return view('client.products', compact('product_categories', 'products'));
    }

    function product($slug)
    {
        $product = $this->postRepository
            ->queryWithTranslate()
            ->where('slug', $slug)
            ->first();
        if (is_null($product)) {
            abort(404);
        }
        $related_posts = $this->postRepository->getRelatedPost($product->id, Category::TYPE_PRODUCT);

        return view('client.product', compact('product', 'related_posts'));
    }

    function productCategory($slug)
    {
        $product_categories = $this->categoryRepository
            ->queryWithTranslate()
            ->where('type', '=', Category::TYPE_PRODUCT)
            ->get();

        $category = $this->categoryRepository
            ->queryWithTranslate()
            ->where('slug', $slug)
            ->first();

        if (is_null($category)) {
            abort(404);
        }
        $products = $this->postRepository
            ->queryWithTranslate()
            ->where('category_ids', 'LIKE', '%"' . $category->id . '"%')
            ->paginate(9);
        return view('client.products', compact('products', 'product_categories'));
    }

    function blogs()
    {
        $blogs = $this->postRepository
            ->skipPresenter()
            ->queryWithTranslate()
            ->where('type', '=', Category::TYPE_BLOG)
            ->paginate(9);

        return view('client.blogs', compact('blogs'));
    }

    function blog($slug)
    {
        $blog = $this->postRepository
            ->queryWithTranslate()
            ->where('slug', $slug)
            ->get()
            ->first();
        if (is_null($blog)) {
            abort(404);
        }
        $related_posts = $this->postRepository->getRelatedPost($blog->id, Category::TYPE_BLOG);

        return view('client.blog', compact('blog', 'related_posts'));
    }

    function recruit()
    {
        $posts = $this->postRepository
            ->queryWithTranslate()
            ->where('type', '=', Category::TYPE_RECRUIT)
            ->paginate(10);

        $current_post = null;
        if (request()->has('job') && !is_null(request()->get('job'))) {
            $current_post = $this->postRepository
                ->whereTranslation('slug', request()->get('job'))
                ->first();
        }
        return view('client.recruit', compact('posts', 'current_post'));
    }

    public function subscription(EmailSubscriberCreateRequest $request)
    {
        $item = $this->emailSubscriberRepository->updateOrCreate(
            [
                'email' => $request->get('email'),
            ],
            [
                'phone' => $request->get('phone') ?? '',
                'option' => $request->get('option') ?? '',
                'status' => 1,
            ]
        );
        return redirect()->back()->with('message', __('client.page.contact.success_msg'));
    }
}
