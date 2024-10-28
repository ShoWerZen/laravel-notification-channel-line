<?php

namespace LeoChien\LaravelNotificationChannelLine;

class LineTemplateMessage extends LineMessage
{
    /** @var null The type of template message, allowed value: buttons, confirm, carousel, image_carousel. */
    protected $type = null;

    /** @var string Image url. */
    protected $thumbnailImageUrl;

    /** @var string Aspect ratio of the image, allowed value: rectangle(1.51:1), square(1:1). */
    protected $imageAspectRatio;

    /** @var string Size of the image, allowed value: cover, contain. */
    protected $imageSize;

    /** @var string Background color of the image. */
    protected $imageBackgroundColor;

    /** @var string Title of the message. */
    protected $title;

    /** @var string Text content of the message. */
    protected $text;

    /** @var array Action when image, title or text area is tapped. */
    protected $defaultAction;

    /** @var array Action when tapped, max objects: 4. */
    protected $actions;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function type(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getThumbnailImageUrl(): ?string
    {
        return $this->thumbnailImageUrl;
    }

    public function thumbnailImageUrl(string $thumbnailImageUrl): self
    {
        $this->thumbnailImageUrl = $thumbnailImageUrl;

        return $this;
    }

    public function getImageAspectRatio(): ?string
    {
        return $this->imageAspectRatio;
    }

    public function imageAspectRatio(string $imageAspectRatio): self
    {
        $this->imageAspectRatio = $imageAspectRatio;

        return $this;
    }

    public function getImageSize(): ?string
    {
        return $this->imageSize;
    }

    public function imageSize(string $imageSize): self
    {
        $this->imageSize = $imageSize;

        return $this;
    }

    public function getImageBackgroundColor(): ?string
    {
        return $this->imageBackgroundColor;
    }

    public function imageBackgroundColor(string $imageBackgroundColor): self
    {
        $this->imageBackgroundColor = $imageBackgroundColor;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function text(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDefaultAction(): ?array
    {
        return $this->defaultAction;
    }

    public function defaultAction(array $defaultAction): self
    {
        $this->defaultAction = $defaultAction;

        return $this;
    }

    public function getActions(): ?array
    {
        return $this->actions;
    }

    public function actions(array $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * Get an array representation of the LineMessage.
     */
    public function toArray(): array
    {
        $payload = [
            'type' => 'template',
            'altText' => $this->getText(),
            'template' => [
                'type' => $this->getType(),
                'text' => $this->getText(),
                'actions' => $this->getActions(),
            ],
        ];

        if($this->getThumbnailImageUrl()) {
            $payload['template']['thumbnailImageUrl'] = $this->getThumbnailImageUrl();
        }

        if($this->getImageAspectRatio()) {
            $payload['template']['imageAspectRatio'] = $this->getImageAspectRatio();
        }

        if($this->getImageSize()) {
            $payload['template']['imageSize'] = $this->getImageSize();
        }

        if($this->getImageBackgroundColor()) {
            $payload['template']['imageBackgroundColor'] = $this->getImageBackgroundColor();
        }

        if($this->getTitle()) {
            $payload['template']['title'] = $this->getTitle();
        }

        if($this->getDefaultAction()) {
            $payload['template']['defaultAction'] = $this->getDefaultAction();
        }

        logger('payload', $payload);

        return array_filter([
            'messages' => [
                $payload,
            ],
        ]);
    }
}
