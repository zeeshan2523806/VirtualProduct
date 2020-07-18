<?php


namespace Zeeshan\VirtualProduct\Block\Sales\Order\Item\Renderer;


use Magento\Framework\Phrase;

class Virtual extends \Magento\Sales\Block\Order\Item\Renderer\DefaultRenderer
{
    public $productRepository;

    private $vendorAttributes = ['vendor_name', 'vendor_number', 'vendor_city'];

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Stdlib\StringUtils $string,
        \Magento\Catalog\Model\Product\OptionFactory $productOptionFactory,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context, $string, $productOptionFactory, $data);
    }

    /**
     * @param null $product_id
     * @return \Magento\Catalog\Api\Data\ProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProductDetail($product_id = null, $store_id = null)
    {

        return $this->productRepository->getById($product_id, false, $store_id);

    }

}
