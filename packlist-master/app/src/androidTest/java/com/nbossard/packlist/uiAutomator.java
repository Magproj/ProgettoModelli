
/*
 * PackList is an open-source packing-list for Android
 *
 * Copyright (c) 2017 Nicolas Bossard and other contributors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

package com.nbossard.packlist;

import android.content.Context;
import android.content.Intent;
import android.graphics.Rect;
import android.os.RemoteException;
import android.support.annotation.Nullable;
import android.support.test.filters.SdkSuppress;
import android.support.test.runner.AndroidJUnit4;
import android.support.test.uiautomator.UiDevice;
import android.support.test.uiautomator.By;
import android.support.test.uiautomator.UiObject;
import android.support.test.uiautomator.UiObjectNotFoundException;
import android.support.test.uiautomator.UiSelector;
import android.support.test.uiautomator.Until;
import android.support.test.InstrumentationRegistry;
import android.widget.Button;
import android.widget.EditText;

import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;

import static junit.framework.Assert.assertTrue;
import static junit.framework.Assert.fail;
import static org.hamcrest.core.IsNull.notNullValue;
import static org.junit.Assert.assertThat;

@RunWith(AndroidJUnit4.class)
@SdkSuppress(minSdkVersion = 18)
public class uiAutomator {

    private static final String BASIC_SAMPLE_PACKAGE = "com.nbossard.packlist.debug";
    private static final int LAUNCH_TIMEOUT = 5000;
    private UiDevice mDevice;
    private Context mTargetContext;

    @Before
    public void startMainActivityFromHomeScreen() {

        mTargetContext = InstrumentationRegistry.getInstrumentation().getTargetContext();
        // Initialize UiDevice instance
        mDevice = UiDevice.getInstance(InstrumentationRegistry.getInstrumentation());

        // Start from the home screen
        mDevice.pressHome();

        // Wait for launcher
        final String launcherPackage = mDevice.getLauncherPackageName();
        assertThat(launcherPackage, notNullValue());
        mDevice.wait(Until.hasObject(By.pkg(launcherPackage).depth(0)),
                LAUNCH_TIMEOUT);

        // Launch the app
        Context context = InstrumentationRegistry.getContext();
        final Intent intent = context.getPackageManager()
                .getLaunchIntentForPackage(BASIC_SAMPLE_PACKAGE);
        // Clear out any previous instances
        intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK);
        context.startActivity(intent);

        // Wait for the app to appear
        mDevice.wait(Until.hasObject(By.pkg(BASIC_SAMPLE_PACKAGE).depth(0)),
                LAUNCH_TIMEOUT);
    }

    @Test
    public void testOpenMenuAndCheckContent() throws UiObjectNotFoundException, InterruptedException {
        // The device has to be in english, however this test will fail
        UiObject menuButton = mDevice.findObject(new UiSelector().descriptionMatches("More options|Plus d\'options"));

        // Simulate a user-click on the menu button, if found.
        if (menuButton.exists() && menuButton.isEnabled()) {
            menuButton.click();
        } else {
            fail("Failed clicking on menu button");
        }

        mDevice.wait(Until.findObject(By.text("About")), TestValues.LET_UI_THREAD_UPDATE_DISPLAY);

        UiObject menuSettings = mDevice.findObject(new UiSelector().textMatches("Settings|Paramètres"));
        UiObject menuSendAReport = mDevice.findObject(new UiSelector().textMatches("Send a report|Envoyer un rapport"));
        UiObject menuWhatsNew = mDevice.findObject(new UiSelector().textMatches("What's new|Quoi de neuf"));
        UiObject menuAbout = mDevice.findObject(new UiSelector().textMatches("About|A propos"));

        assertTrue("Missing \"settings\" menu entry", menuSettings.exists());
        assertTrue("Missing \"send a report\" menu entry", menuSendAReport.exists());
        assertTrue("Missing \"what's new\" menu entry", menuWhatsNew.exists());
        assertTrue("Missing \"about\" menu entry", menuAbout.exists());
    }

    @Test
    public void testMenuSettings() throws InterruptedException, UiObjectNotFoundException {
        testOpenMenuAndCheckContent();

        UiObject menuSettings = mDevice.findObject(new UiSelector().textMatches("Settings|Paramètres"));

        if (menuSettings.exists() && menuSettings.isEnabled()) {
            menuSettings.click();
        }

        // check displayed
        UiObject menuSettingsDate = mDevice.findObject(new UiSelector().text("Display dates|Afficher dates"));

        assertTrue("Missing \"Display dates\" menu entry", menuSettingsDate.exists());
    }

    @Test
    public void testMenuSendReport() throws InterruptedException, UiObjectNotFoundException {
        testOpenMenuAndCheckContent();

        UiObject menuSendReport = mDevice.findObject(new UiSelector().text("Send a report|Envoyer un rapport"));

        if (menuSendReport.exists() && menuSendReport.isEnabled()) {
            menuSendReport.click();
        }

        // check displayed (does not work in debug mode as ACRA is not initialized)
        UiObject menuSettingsDate = mDevice.findObject(new UiSelector().text("TODO"));

        assertTrue("Missing \"TODO\" menu entry", menuSettingsDate.exists());
    }

    @Test
    public void testEmptyList() throws UiObjectNotFoundException, InterruptedException {

        deleteAllTrips();

        // typically : "No trip planned"
        String noTripPlannedStr = mTargetContext.getString(R.string.main__no_trip_yet__label);
        mDevice.wait(Until.findObject(By.textContains(noTripPlannedStr)), TestValues.LET_UI_THREAD_UPDATE_DISPLAY);
        UiObject emptyListText = mDevice.findObject(new UiSelector().textContains(noTripPlannedStr));
        assertTrue(emptyListText.exists());
    }

    // Removed @Test as fully included in testOpenTrip
    public void testAddTrip() throws UiObjectNotFoundException, InterruptedException {
        deleteAllTrips();
        addTripTo("Rome", null);
    }

    // Removed @Test as fully included in testAddItem
    public void testOpenTrip() throws UiObjectNotFoundException, InterruptedException {

        testAddTrip();

        openFirstTripInList();
    }

    @Test
    public void testAddItem() throws UiObjectNotFoundException, InterruptedException {

        testOpenTrip();

        addAnItem();

        addAnItemWithWeight();

        //ensure total weight is now displayed
        UiObject weightSumText = mDevice.findObject(new UiSelector().textMatches(".*plus de 100g.*|.*more than 100g.*"));
        assertTrue(weightSumText.exists());
    }

    @Test
    public void testLongUsage() throws UiObjectNotFoundException, InterruptedException
    {
        deleteAllTrips();
        addTripTo("Rome", null);
        openFirstTripInList();

        for (int i=0; i<50; i++)
        {
            addAnItem("test_" + i);

            synchronized (mDevice)
            {
                mDevice.wait(500);
            }
            addAnItemWithWeight("testWeight_" + i , "100");
            synchronized (mDevice)
            {
                mDevice.wait(500);
            }
            checkItem("test_" + i);
            synchronized (mDevice)
            {
                mDevice.wait(1000);
            }

        }
    }

    private void checkItem(String parItemName) throws UiObjectNotFoundException
    {
        UiObject objectToBeChecked = mDevice.findObject(new UiSelector().textMatches(parItemName));
        objectToBeChecked.click();
    }

    /**
     * This is not really a test, more a prefilling of a device with french data for making screenshots.
     */
    @Test
    public void populateWithFrenchData() throws UiObjectNotFoundException {
        deleteAllTrips();
        addTripTo("Londres", "Visite chez Google");
        addTripTo("Rome", "La ville éternelle");
        addTripTo("Dublin", "En famille");

        openFirstTripInList();
        addAnItem("Chapeau");
        addAnItem("PC");
        addAnItem("Brosse à dents");
        addAnItemWithWeight("Un bon roman", "150");
    }

    /**
     * This is not really a test, more a prefilling of a device with english data for making screenshots.
     */
    @Test
    public void populateWithEnglishData() throws UiObjectNotFoundException {
        deleteAllTrips();
        addTripTo("London", "Business trip");
        addTripTo("Rome", "Eternal city");
        addTripTo("Dublin", "In family");

        openFirstTripInList();
        addAnItem("Hat");
        addAnItem("Computer");
        addAnItem("Toothbrush");
        addAnItemWithWeight("A good book", "150");
    }

    @Test
    public void goToBackgroundAndCheckResume() throws InterruptedException, UiObjectNotFoundException, RemoteException {

        deleteAllTrips();
        addTripTo("Rome", null);
        openFirstTripInList();
        addAnItem("Chapeau");
        addAnItem("PC");
        addAnItem("Brosse à dents");
        addAnItemWithWeight("Un bon roman", "150");

        // go to background
        mDevice.pressHome();

        // and come back to app
        mDevice.pressRecentApps();
        UiObject appBackground = new UiObject(new UiSelector().description("packlist(debug)"));
        appBackground.click();

        // one bug (serialization prb) made item not be back there : checking this
        checkItem("Chapeau");
    }

    // *********************** PRIVATE METHODS **************************************************************

    private void addAnItem() throws UiObjectNotFoundException {
        addAnItem("Chapeau");
    }

    private void addAnItem(String parName) throws UiObjectNotFoundException {

        //fill item name
        UiObject editTripName = mDevice.findObject(new UiSelector().className(EditText.class));
        editTripName.setText(parName);

        //add item
        UiObject saveButton = mDevice.findObject(new UiSelector().className(Button.class).textMatches("(Add item|Ajouter)"));
        saveButton.clickAndWaitForNewWindow();
    }

    private void addAnItemWithWeight() throws UiObjectNotFoundException {
        addAnItemWithWeight("Pantalon", "100");
    }

    private void addAnItemWithWeight(String parName, String parWeight) throws UiObjectNotFoundException {

        //fill item name
        UiObject editTripName = mDevice.findObject(new UiSelector().className(EditText.class));
        editTripName.setText(parName);

        //add item with weight
        UiObject saveButton = mDevice.findObject(new UiSelector().className(Button.class).resourceId("com.nbossard.packlist.debug:id/trip_detail__new_item_detail__button"));
        saveButton.clickAndWaitForNewWindow();

        // type weight
        UiObject editWeight = mDevice.findObject(new UiSelector().resourceId("com.nbossard.packlist.debug:id/item_detail__weight__edit"));
        editWeight.setText(parWeight);

        //close the window (update button)
        UiObject updateButton = mDevice.findObject(new UiSelector().className(Button.class).textMatches("(UPDATE|MODIFIER)"));
        updateButton.clickAndWaitForNewWindow();
    }


    /**
     * Open trip edit, fill with data and close.
     */
    private void addTripTo(String parTripName, @Nullable String parTripNote) throws UiObjectNotFoundException {
        // click on FAB
        UiObject fab = mDevice.findObject(new UiSelector().descriptionMatches("(Add a new trip|Ajouter un nouveau voyage)"));
        fab.clickAndWaitForNewWindow();

        //fill trip name
        UiObject editTripName = mDevice.findObject(new UiSelector().resourceId("com.nbossard.packlist.debug:id/new_trip__name__edit"));
        editTripName.setText(parTripName);

        //fill comment
        if (parTripNote != null) {
            UiObject editTripNote = mDevice.findObject(new UiSelector().resourceId("com.nbossard.packlist.debug:id/new_trip__note__edit"));
            editTripNote.setText(parTripNote);
        }

        //save trip
        UiObject saveButton = mDevice.findObject(new UiSelector().className(Button.class));
        saveButton.clickAndWaitForNewWindow();
    }

    private void openFirstTripInList() throws UiObjectNotFoundException {
        UiObject listView = mDevice.findObject(new UiSelector().className("android.widget.ListView"));
        UiObject firstLine = listView.getChild(new UiSelector().clickable(true).index(0));
        firstLine.clickAndWaitForNewWindow();
    }

    private void deleteAllTrips() throws UiObjectNotFoundException {
        UiObject listView = mDevice.findObject(new UiSelector().className("android.widget.ListView"));
        UiObject firstLine = listView.getChild(new UiSelector().clickable(true).index(0));

        while (firstLine.exists() && firstLine.isEnabled()) {

            Rect firstLineRect = firstLine.getBounds();
            mDevice.swipe(firstLineRect.centerX(),
                    firstLineRect.centerY(),
                    firstLineRect.centerX(),
                    firstLineRect.centerY(), 300);


            UiObject deleteButton = mDevice.findObject(new UiSelector().descriptionMatches("(Delete|Supprimer)"));
            deleteButton.click();

            // confirm deletion dialog, click on OK
            UiObject confirmDialogOk = mDevice.findObject(new UiSelector().textMatches("OK"));
            confirmDialogOk.click();
        }
    }
}