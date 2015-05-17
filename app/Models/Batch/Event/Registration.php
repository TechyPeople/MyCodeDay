<?php
namespace CodeDay\Clear\Models\Batch\Event;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Registration extends \Eloquent {
    protected $table = 'batches_events_registrations';
    public $incrementing = false;

    use SoftDeletingTrait;

    public function event()
    {
        return $this->belongsTo('\CodeDay\Clear\Models\Batch\Event', 'batches_event_id', 'id');
    }

    public function getEmailMd5Attribute()
    {
        return hash('md5', $this->email);
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getRelatedRegistrationsAttribute()
    {
        if (!$this->stripe_id) {
            return [];
        }

        return self::where('id', '!=', $this->id)
            ->where('stripe_id', '=', $this->stripe_id)
            ->get();
    }

    public function getAllInOrderAttribute()
    {
        if (!$this->stripe_id) {
            return [$this];
        }

        return self::where('stripe_id', '=', $this->stripe_id)
            ->get();
    }

    public function getOrderAmountPaidAttribute()
    {
        $all_in_order = $this->all_in_order;
        if (!is_array($all_in_order)) {
            $all_in_order = iterator_to_array($all_in_order);
        }

        return array_reduce($all_in_order, function($a, $b) {
            return (object)['amount_paid' => $a->amount_paid + $b->amount_paid];
        }, (object)["amount_paid" => 0])->amount_paid;
    }

    public function getOrderAmountReceivedAttribute()
    {
        if (!$this->stripe_id || $this->order_amount_paid == 0) {
            return 0;
        }

        $stripe_fee = ($this->order_amount_paid * 0.027) + 0.30;
        return $this->order_amount_paid - $stripe_fee;
    }

    public function getAmountReceivedAttribute()
    {
        $paid_in_order = [];
        foreach ($this->all_in_order as $reg) {
            if ($reg->amount_paid > 0) {
                $paid_in_order[] = $reg;
            }
        }
        return $this->order_amount_received/count($paid_in_order);
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'checked_in_at'];
    }

    public function promotion()
    {
        return $this->hasOne('\CodeDay\Clear\Models\Batch\Event\Promotion', 'id', 'batches_events_promotion_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $id = null;
            do {
                $id = self::generateUnambiguousRandomString(15);
            } while (self::where('id', '=', $id)->exists());

            $model->{$model->getKeyName()} = $id;
        });
    }

    private static function generateUnambiguousRandomString($length = 10) {
        $characters = '234679abcdefghkmnpqruvwxy';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}