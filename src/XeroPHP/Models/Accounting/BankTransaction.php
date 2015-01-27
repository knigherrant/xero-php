<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\BankTransaction\LineItem;
use XeroPHP\Models\Accounting\BankTransaction\BankAccount;

class BankTransaction extends Remote\Object {

    /**
     * See Bank Transaction Types
     *
     * @property string Type
     */

    /**
     * See Contacts
     *
     * @property Contact Contact
     */

    /**
     * See LineItems
     *
     * @property LineItem[] Lineitems
     */

    /**
     * Bank account for transaction. See BankAccount
     *
     * @property BankAccount BankAccount
     */

    /**
     * Boolean to show if transaction is reconciled
     *
     * @property bool IsReconciled
     */

    /**
     * Date of transaction – YYYY-MM-DD
     *
     * @property \DateTime Date
     */

    /**
     * reference for the transaction
     *
     * @property string Reference
     */

    /**
     * The currency that bank transaction has been raised in (see Currencies)
     *
     * @property string CurrencyCode
     */

    /**
     * Exchange rate to base currency when money is spent or received. e.g. 0.7500 Only used for bank
     * transactions in non base currency. If this isn’t specified for non base currency accounts then
     * either the user-defined rate (preference) or the XE.com day rate will be used
     *
     * @property float CurrencyRate
     */

    /**
     * URL link to a source document – shown as "Go to App Name"
     *
     * @property string Url
     */

    /**
     * See Bank Transaction Status Codes
     *
     * @property string Status
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount
     * Types
     *
     * @property float[] LineAmountTypes
     */

    /**
     * Total of bank transaction excluding taxes
     *
     * @property float SubTotal
     */

    /**
     * Total tax on bank transaction
     *
     * @property float TotalTax
     */

    /**
     * Total of bank transaction tax inclusive
     *
     * @property float Total
     */

    /**
     * Xero generated unique identifier for bank transaction
     *
     * @property string BankTransactionID
     */

    /**
     * Last modified date UTC format
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * Boolean to indicate if a bank transaction has an attachment
     *
     * @property bool HasAttachments
     */


    const TYPE_RECEIVE             = 'RECEIVE'; 
    const TYPE_RECEIVE_OVERPAYMENT = 'RECEIVE-OVERPAYMENT'; 
    const TYPE_RECEIVE_PREPAYMENT  = 'RECEIVE-PREPAYMENT'; 
    const TYPE_SPEND               = 'SPEND'; 
    const TYPE_SPEND_OVERPAYMENT   = 'SPEND-OVERPAYMENT'; 
    const TYPE_SPEND_PREPAYMENT    = 'SPEND-PREPAYMENT'; 
    const TYPE_RECEIVE_TRANSFER    = 'RECEIVE-TRANSFER'; 
    const TYPE_SPEND_TRANSFER      = 'SPEND-TRANSFER'; 

    const BANK_TRANSACTION_STATUS_AUTHORISED = 'AUTHORISED'; 
    const BANK_TRANSACTION_STATUS_DELETED    = 'DELETED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'BankTransactions';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'BankTransaction';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'BankTransactionID';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
    */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'Type' => array (true, self::PROPERTY_TYPE_ENUM, null, false),
            'Contact' => array (true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact', false),
            'Lineitems' => array (true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\BankTransaction\\LineItem', true),
            'BankAccount' => array (true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\BankTransaction\\BankAccount', false),
            'IsReconciled' => array (false, self::PROPERTY_TYPE_BOOLEAN, null, false),
            'Date' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'Reference' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'CurrencyCode' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'CurrencyRate' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Url' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Status' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'LineAmountTypes' => array (false, self::PROPERTY_TYPE_FLOAT, null, true),
            'SubTotal' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'TotalTax' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Total' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'BankTransactionID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'UpdatedDateUTC' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'HasAttachments' => array (false, self::PROPERTY_TYPE_BOOLEAN, null, false)
        );
    }


    /**
     * @return string
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setType($value){
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(){
        return $this->_data['Contact'];
    }

    /**
     * @param Contact $value
     * @return BankTransaction
     */
    public function setContact(Contact $value){
        $this->propertyUpdated('Contact', $value);
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return LineItem
     */
    public function getLineitems(){
        return $this->_data['Lineitems'];
    }

    /**
     * @param LineItem[] $value
     * @return BankTransaction
     */
    public function addLineitem(LineItem $value){
        $this->propertyUpdated('Lineitems', $value);
        $this->_data['Lineitems'][] = $value;
        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccount(){
        return $this->_data['BankAccount'];
    }

    /**
     * @param BankAccount $value
     * @return BankTransaction
     */
    public function setBankAccount(BankAccount $value){
        $this->propertyUpdated('BankAccount', $value);
        $this->_data['BankAccount'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsReconciled(){
        return $this->_data['IsReconciled'];
    }

    /**
     * @param bool $value
     * @return BankTransaction
     */
    public function setIsReconciled($value){
        $this->propertyUpdated('IsReconciled', $value);
        $this->_data['IsReconciled'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param \DateTime $value
     * @return BankTransaction
     */
    public function setDate(\DateTime $value){
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(){
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setReference($value){
        $this->propertyUpdated('Reference', $value);
        $this->_data['Reference'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(){
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setCurrencyCode($value){
        $this->propertyUpdated('CurrencyCode', $value);
        $this->_data['CurrencyCode'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCurrencyRate(){
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param float $value
     * @return BankTransaction
     */
    public function setCurrencyRate($value){
        $this->propertyUpdated('CurrencyRate', $value);
        $this->_data['CurrencyRate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->_data['Url'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setUrl($value){
        $this->propertyUpdated('Url', $value);
        $this->_data['Url'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setStatus($value){
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param float[] $value
     * @return BankTransaction
     */
    public function addLineAmountType($value){
        $this->propertyUpdated('LineAmountTypes', $value);
        $this->_data['LineAmountTypes'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getSubTotal(){
        return $this->_data['SubTotal'];
    }

    /**
     * @param float $value
     * @return BankTransaction
     */
    public function setSubTotal($value){
        $this->propertyUpdated('SubTotal', $value);
        $this->_data['SubTotal'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTax(){
        return $this->_data['TotalTax'];
    }

    /**
     * @param float $value
     * @return BankTransaction
     */
    public function setTotalTax($value){
        $this->propertyUpdated('TotalTax', $value);
        $this->_data['TotalTax'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(){
        return $this->_data['Total'];
    }

    /**
     * @param float $value
     * @return BankTransaction
     */
    public function setTotal($value){
        $this->propertyUpdated('Total', $value);
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankTransactionID(){
        return $this->_data['BankTransactionID'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setBankTransactionID($value){
        $this->propertyUpdated('BankTransactionID', $value);
        $this->_data['BankTransactionID'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return BankTransaction
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments(){
        return $this->_data['HasAttachments'];
    }

    /**
     * @param bool $value
     * @return BankTransaction
     */
    public function setHasAttachment($value){
        $this->propertyUpdated('HasAttachments', $value);
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}